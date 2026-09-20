<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DigiflazzService
{
    protected string $username;
    protected string $apiKey;
    protected string $baseUrl;

    public function __construct()
    {
        $this->username = (string) config('services.digiflazz.username');
        $this->apiKey = (string) config('services.digiflazz.api_key');

        $this->baseUrl = config(
            'services.digiflazz.base_url',
            'https://api.digiflazz.com/v1'
        );
    }

    /**
     * Request ke API Digiflazz.
     */
    protected function request(string $endpoint, array $payload): array
    {
        $url = rtrim($this->baseUrl, '/') . '/' . ltrim($endpoint, '/');

        try {
   $response = Http::withOptions([
    'force_ip_resolve' => 'v4',
])
    ->timeout(30)
    ->acceptJson()
    ->post($url, $payload);
    

            if (!$response->successful()) {
                Log::error('Digiflazz HTTP Error', [
                    'url' => $url,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [
                    'success' => false,
                    'message' => 'Digiflazz HTTP error: ' . $response->status(),
                    'data' => [],
                    'raw' => $response->json(),
                ];
            }

            return [
                'success' => true,
                'message' => null,
                'data' => $response->json() ?? [],
                'raw' => $response->json() ?? [],
            ];

        } catch (\Throwable $e) {

            Log::error('Digiflazz Connection Error', [
                'url' => $url,
                'message' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => [],
                'raw' => [],
            ];
        }
    }

    /**
     * Generate signature Digiflazz.
     *
     * md5(username + api_key + ref_id)
     */
    protected function signature(string $refId): string
    {
        return md5(
            $this->username .
            $this->apiKey .
            $refId
        );
    }

    /**
     * Transaksi Digiflazz.
     */
    public function transaction(
        string $sku,
        string $customerNo,
        string $refId
    ): array {
        $payload = [
            'username' => $this->username,

            'buyer_sku_code' => $sku,

            'customer_no' => $customerNo,

            'ref_id' => $refId,

            'sign' => $this->signature($refId),
        ];

        Log::info('Digiflazz Transaction Request', [
            'sku' => $sku,
            'customer_no' => $customerNo,
            'ref_id' => $refId,
        ]);

        $result = $this->request(
            '/transaction',
            $payload
        );

        Log::info('Digiflazz Transaction Response', [
            'sku' => $sku,
            'customer_no' => $customerNo,
            'ref_id' => $refId,
            'response' => $result,
        ]);

        if (!$result['success']) {
            return [
                'success' => false,
                'message' => $result['message'],
                'data' => [],
                'raw' => $result['raw'],
            ];
        }

        $response = $result['data'];

        /*
        |--------------------------------------------------------------------------
        | Digiflazz biasanya mengembalikan:
        |
        | {
        |     "data": {
        |         "ref_id": "...",
        |         "status": "Sukses",
        |         "code": "...",
        |         "message": "...",
        |         "sn": "..."
        |     }
        | }
        |--------------------------------------------------------------------------
        */

        $data = $response['data'] ?? [];

        return [
            'success' => true,
            'message' => $response['message'] ?? null,
            'data' => $data,
            'raw' => $response,
        ];
    }

    /**
     * Cek nickname Mobile Legends menggunakan SKU cekml.
     */
    public function checkMobileLegends(
        string $userId,
        string $serverId
    ): array {
        $refId = 'CHECKML-' . strtoupper(Str::random(16));

        /*
        |--------------------------------------------------------------------------
        | Digiflazz menggunakan customer_no untuk target pelanggan.
        |
        | Untuk MLBB:
        | user_id + zone/server_id
        |--------------------------------------------------------------------------
        */

        $customerNo = $userId . $serverId;

        $result = $this->transaction(
            'cekml',
            $customerNo,
            $refId
        );

        Log::info('Digiflazz MLBB Check Result', [
            'user_id' => $userId,
            'server_id' => $serverId,
            'customer_no' => $customerNo,
            'ref_id' => $refId,
            'result' => $result,
        ]);

        if (!$result['success']) {
            return [
                'success' => false,
                'message' => $result['message']
                    ?? 'Gagal menghubungi Digiflazz.',
                'nickname' => null,
                'ref_id' => $refId,
                'raw' => $result['raw'] ?? [],
            ];
        }

        $data = $result['data'] ?? [];

        $status = strtolower(
            trim((string) ($data['status'] ?? ''))
        );

        $message = $data['message']
            ?? $result['message']
            ?? '';

        /*
        |--------------------------------------------------------------------------
        | Cari nickname/username dari beberapa kemungkinan field.
        |--------------------------------------------------------------------------
        */

        $nickname =
            $data['nickname']
            ?? $data['username']
            ?? $data['customer_name']
            ?? null;

        /*
        |--------------------------------------------------------------------------
        | Beberapa produk checker/provider dapat mengembalikan
        | nickname melalui SN.
        |--------------------------------------------------------------------------
        */

        $sn = $data['sn'] ?? null;

        if (!$nickname && $sn) {
            $nickname = $this->extractNicknameFromSn($sn);
        }

        /*
        |--------------------------------------------------------------------------
        | Status sukses
        |--------------------------------------------------------------------------
        */

        $successStatuses = [
            'sukses',
            'success',
            'successful',
        ];

        if (
            in_array($status, $successStatuses, true)
            && $nickname
        ) {
            return [
                'success' => true,
                'message' => $message ?: 'ID Mobile Legends ditemukan.',
                'nickname' => $nickname,
                'ref_id' => $refId,
                'raw' => $result['raw'] ?? [],
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Kalau status sukses tetapi Digiflazz tidak mengirim nickname
        | secara terpisah, kita kembalikan respons mentah untuk debugging.
        |--------------------------------------------------------------------------
        */

        if (
            in_array($status, $successStatuses, true)
            && !$nickname
        ) {
            return [
                'success' => false,
                'message' => $message
                    ?: 'Digiflazz berhasil memproses pengecekan, tetapi nickname tidak ditemukan pada response.',
                'nickname' => null,
                'ref_id' => $refId,
                'raw' => $result['raw'] ?? [],
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | ID tidak valid / transaksi gagal.
        |--------------------------------------------------------------------------
        */

        return [
            'success' => false,
            'message' => $message
                ?: 'ID Mobile Legends tidak ditemukan.',
            'nickname' => null,
            'ref_id' => $refId,
            'raw' => $result['raw'] ?? [],
        ];
    }

    /**
     * Helper untuk mencoba mengambil nickname
     * jika provider memasukkannya ke SN.
     */
    protected function extractNicknameFromSn(string $sn): ?string
    {
        $sn = trim($sn);

        if ($sn === '') {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Jangan langsung menganggap seluruh SN sebagai nickname.
        |
        | Hanya menangani beberapa format sederhana.
        |--------------------------------------------------------------------------
        */

        $patterns = [
            '/nickname\s*[:=]\s*([^|;,]+)/i',
            '/username\s*[:=]\s*([^|;,]+)/i',
            '/name\s*[:=]\s*([^|;,]+)/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $sn, $matches)) {
                return trim($matches[1]);
            }
        }

        return null;
    }
}