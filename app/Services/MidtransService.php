<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class MidtransService
{
    protected string $baseUrl;

    protected string $serverKey;

    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');

        $this->baseUrl = config('midtrans.is_production')
            ? 'https://api.midtrans.com'
            : 'https://api.sandbox.midtrans.com';
    }

    public function chargeQris(
        string $orderId,
        int $grossAmount,
        string $productName,
        ?string $email = null
    ): array {
        $payload = [

            'payment_type' => 'qris',

            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],

            'item_details' => [
                [
                    'id' => $orderId,
                    'price' => $grossAmount,
                    'quantity' => 1,
                    'name' => $productName,
                ],
            ],

            'customer_details' => [
                'email' => $email,
            ],

            'qris' => [
                'acquirer' => 'gopay',
            ],

        ];

        $response = Http::withBasicAuth(
            $this->serverKey,
            ''
        )
        ->acceptJson()
        ->post(
            $this->baseUrl . '/v2/charge',
            $payload
        );

        if ($response->failed()) {
            throw new Exception(
                'Midtrans Error: ' . $response->body()
            );
        }

        return $response->json();
    }
}