<?php

namespace App\Http\Controllers;

use App\Models\TopUpOrder;
use App\Services\DigiflazzService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\CoreApi;

class TopUpController extends Controller
{
    /**
     * Konfigurasi Midtrans.
     */
    public function __construct()
    {
        Config::$serverKey =
            config('midtrans.server_key');

        Config::$clientKey =
            config('midtrans.client_key');

        Config::$isProduction =
            config(
                'midtrans.is_production',
                false
            );

        Config::$isSanitized = true;

        Config::$is3ds = true;
    }

    /**
     * Daftar game.
     */
    public function index()
    {
        $games = [

            [
                'id' => 'mobile-legends',
                'name' => 'Mobile Legends',
                'category' => 'MOBA',
                'image' => asset('images/games/ml.webp'),
                'icon' => '🎮',
                'color' => '#5B61D6',
                'description' =>
                    'Mobile Legends: Bang Bang',
            ],

            [
                'id' => 'free-fire',
                'name' => 'Free Fire',
                'category' => 'Battle Royale',
                'image' => asset('images/games/ff.webp'),
                'icon' => '🔥',
                'color' => '#F97316',
                'description' =>
                    'Garena Free Fire',
            ],

            [
                'id' => 'pubg-mobile',
                'name' => 'PUBG Mobile',
                'category' => 'Battle Royale',
                'image' => asset('images/games/pubg.webp'),
                'icon' => '🎯',
                'color' => '#D4A017',
                'description' =>
                    'PUBG Mobile',
            ],

            [
                'id' => 'honor-of-kings',
                'name' => 'Honor of Kings',
                'category' => 'MOBA',
                'image' => asset('images/games/hok.webp'),
                'icon' => '👑',
                'color' => '#2563EB',
                'description' =>
                    'Honor of Kings',
            ],

            [
                'id' => 'genshin-impact',
                'name' => 'Genshin Impact',
                'category' => 'RPG',
                'image' => asset('images/games/genshin.webp'),
                'icon' => '✨',
                'color' => '#0EA5E9',
                'description' =>
                    'Genshin Impact',
            ],

            [
                'id' => 'valorant',
                'name' => 'Valorant',
                'category' => 'FPS',
                'image' => asset('images/games/valorant.webp'),
                'icon' => '⚡',
                'color' => '#E11D48',
                'description' =>
                    'Valorant',
            ],

        ];

        return view(
            'home',
            compact('games')
        );
    }

    /**
     * Halaman top up.
     */
    public function show(string $game)
    {
        $games = [

            'mobile-legends' => [

                'name' => 'Mobile Legends',

                'category' => 'MOBA',

                'icon' => '🎮',

                'color' => '#5B61D6',

                'description' =>
                    'Mobile Legends: Bang Bang',

                'view' =>
                    'topup.mobile-legends.show',

                'fields' => [

                    'user_id',

                    'server_id',

                ],

                'currency' =>
                    'Diamonds',

            ],

            'free-fire' => [

                'name' => 'Free Fire',

                'category' => 'Battle Royale',

                'icon' => '🔥',

                'color' => '#F97316',

                'description' =>
                    'Garena Free Fire',

                'view' =>
                    'topup.free-fire.show',

                'fields' => [

                    'user_id',

                ],

                'currency' =>
                    'Diamonds',

            ],

            'pubg-mobile' => [

                'name' => 'PUBG Mobile',

                'category' => 'Battle Royale',

                'icon' => '🎯',

                'color' => '#D4A017',

                'description' =>
                    'PUBG Mobile',

                'view' =>
                    'topup.pubg-mobile.show',

                'fields' => [

                    'user_id',

                ],

                'currency' =>
                    'UC',

            ],

            'honor-of-kings' => [

                'name' => 'Honor of Kings',

                'category' => 'MOBA',

                'icon' => '👑',

                'color' => '#2563EB',

                'description' =>
                    'Honor of Kings',

                'view' =>
                    'topup.honor-of-kings.show',

                'fields' => [

                    'user_id',

                ],

                'currency' =>
                    'Tokens',

            ],

            'genshin-impact' => [

                'name' => 'Genshin Impact',

                'category' => 'RPG',

                'icon' => '✨',

                'color' => '#0EA5E9',

                'description' =>
                    'Genshin Impact',

                'view' =>
                    'topup.genshin-impact.show',

                'fields' => [

                    'uid',

                    'server',

                ],

                'currency' =>
                    'Genesis Crystals',

            ],

            'valorant' => [

                'name' => 'Valorant',

                'category' => 'FPS',

                'icon' => '⚡',

                'color' => '#E11D48',

                'description' =>
                    'Valorant',

                'view' =>
                    'topup.valorant.show',

                'fields' => [

                    'riot_id',

                    'region',

                ],

                'currency' =>
                    'VP',

            ],

        ];

        abort_unless(
            isset($games[$game]),
            404
        );

        $gameData =
            $games[$game];

        $products = [];

        /**
         * Mobile Legends.
         */
        if ($game === 'mobile-legends') {

            $products = [

                [
                    'name' =>
                        'Mobile Legends 5 Diamond',

                    'type' =>
                        'IP',

                    'code' =>
                        'ML5',

                    'price' =>
                        1530,

                    'status' =>
                        true,
                ],

                [
                    'name' =>
                        'Mobile Legends 10 Diamond',

                    'type' =>
                        'API',

                    'code' =>
                        'MLBB_ID_10',

                    'price' =>
                        2859,

                    'status' =>
                        true,
                ],

                [
                    'name' =>
                        'Mobile Legends 12 Diamond',

                    'type' =>
                        'API',

                    'code' =>
                        'ML12',

                    'price' =>
                        3400,

                    'status' =>
                        true,
                ],

                [
                    'name' =>
                        'Mobile Legends 50 Diamond',

                    'type' =>
                        'IP',

                    'code' =>
                        'GML50',

                    'price' =>
                        15975,

                    'status' =>
                        true,
                ],

                [
                    'name' =>
                        'Mobile Legends 150 Diamond',

                    'type' =>
                        'API',

                    'code' =>
                        'di-ml-150',

                    'price' =>
                        42747,

                    'status' =>
                        true,
                ],

                [
                    'name' =>
                        'Mobile Legends 500 Diamond',

                    'type' =>
                        'API',

                    'code' =>
                        'di-ml-500',

                    'price' =>
                        140261,

                    'status' =>
                        true,
                ],

            ];
        }

        abort_unless(
            view()->exists(
                $gameData['view']
            ),
            500,
            'View top up untuk game "' .
            $gameData['name'] .
            '" belum tersedia.'
        );

        return view(
            $gameData['view'],
            [

                'game' =>
                    $gameData,

                'gameSlug' =>
                    $game,

                'products' =>
                    $products,

            ]
        );
    }

    /**
     * Membuat order dan transaksi
     * Midtrans QRIS.
     */
    public function createOrder(
        Request $request
    ) {
        $validated =
            $request->validate([

                'game' => [

                    'required',

                    'string',

                    'in:mobile-legends',

                ],

                'user_id' => [

                    'required',

                    'string',

                    'max:100',

                ],

                'server_id' => [

                    'required',

                    'string',

                    'max:100',

                ],

                'sku' => [

                    'required',

                    'string',

                    'max:100',

                ],

                'product_name' => [

                    'required',

                    'string',

                    'max:255',

                ],

                'price' => [

                    'required',

                    'numeric',

                    'min:1',

                ],

                'payment_method' => [

                    'required',

                    'string',

                    'max:50',

                ],

            ]);

        /**
         * Produk resmi yang diperbolehkan.
         *
         * Jangan mempercayai harga
         * yang dikirim dari browser.
         */
        $allowedProducts = [

            'ML5' => [

                'name' =>
                    'Mobile Legends 5 Diamond',

                'price' =>
                    1530,

            ],

            'MLBB_ID_10' => [

                'name' =>
                    'Mobile Legends 10 Diamond',

                'price' =>
                    2859,

            ],

            'ML12' => [

                'name' =>
                    'Mobile Legends 12 Diamond',

                'price' =>
                    3400,

            ],

            'GML50' => [

                'name' =>
                    'Mobile Legends 50 Diamond',

                'price' =>
                    15975,

            ],

            'di-ml-150' => [

                'name' =>
                    'Mobile Legends 150 Diamond',

                'price' =>
                    42747,

            ],

            'di-ml-500' => [

                'name' =>
                    'Mobile Legends 500 Diamond',

                'price' =>
                    140261,

            ],

        ];

        /**
         * Cek SKU.
         */
        abort_unless(

            isset(
                $allowedProducts[
                    $validated['sku']
                ]
            ),

            422,

            'Produk tidak valid.'

        );

        $product =
            $allowedProducts[
                $validated['sku']
            ];

        /**
         * Cek harga.
         */
        if (

            (float)
            $validated['price']

            !==

            (float)
            $product['price']

        ) {

            return back()

                ->withErrors([

                    'sku' =>
                        'Harga produk tidak valid.'

                ])

                ->withInput();

        }

        /**
         * Order ID Midtrans.
         *
         * Harus unik.
         */
        $orderId =
            'TRING-' .
            strtoupper(
                Str::random(16)
            );

        /**
         * Customer number Digiflazz.
         */
        $customerNo =
            $validated['user_id'] .
            $validated['server_id'];

        /**
         * Buat order database.
         */
        $order =
            TopUpOrder::create([

                'order_id' =>
                    $orderId,

                'game' =>
                    $validated['game'],

                'user_id' =>
                    $validated['user_id'],

                'server_id' =>
                    $validated['server_id'],

                'sku' =>
                    $validated['sku'],

                'product_name' =>
                    $product['name'],

                'price' =>
                    $product['price'],

                'payment_method' =>
                    $validated['payment_method'],

                'payment_status' =>
                    'unpaid',

                'status' =>
                    'pending',

            ]);

        /**
         * ============================
         * MIDTRANS CORE API
         * ============================
         */
        try {

            $customerName =
                'Customer';

            $customerEmail =
                null;

            if (auth()->check()) {

                $customerName =
                    auth()->user()->name
                    ?? 'Customer';

                $customerEmail =
                    auth()->user()->email
                    ?? null;
            }

            /**
             * Parameter Core API.
             */
            $params = [

                'payment_type' =>
                    'qris',

                'transaction_details' => [

                    'order_id' =>
                        $order->order_id,

                    'gross_amount' =>
                        (int) $order->price,

                ],

                'item_details' => [

                    [

                        'id' =>
                            $order->sku,

                        'price' =>
                            (int) $order->price,

                        'quantity' =>
                            1,

                        'name' =>
                            $order->product_name,

                    ],

                ],

                'customer_details' => [

                    'first_name' =>
                        $customerName,

                    'email' =>
                        $customerEmail,

                ],

                'qris' => [

                    'acquirer' =>
                        'gopay',

                ],

            ];

            /**
             * Charge Midtrans.
             */
            $midtransResponse =
                CoreApi::charge(
                    $params
                );

            /**
             * Cari URL QR Code.
             */
            $qrCodeUrl =
                null;

            if (

                isset(
                    $midtransResponse->actions
                )

                &&

                is_array(
                    $midtransResponse->actions
                )

            ) {

                foreach (

                    $midtransResponse->actions
                    as $action

                ) {

                    if (

                        isset(
                            $action->name
                        )

                        &&

                        $action->name
                            ===
                            'generate-qr-code'

                    ) {

                        $qrCodeUrl =
                            $action->url;

                        break;

                    }

                }

            }

            /**
             * Simpan response Midtrans.
             */
            $order->update([

                'provider_response' =>

                    json_decode(

                        json_encode(
                            $midtransResponse
                        ),

                        true

                    ),

            ]);

            /**
             * Pastikan QR tersedia.
             */
            if (!$qrCodeUrl) {

                Log::error(
                    'Midtrans QRIS URL tidak ditemukan.',
                    [
                        'order_id' =>
                            $order->order_id,

                        'response' =>
                            json_decode(
                                json_encode(
                                    $midtransResponse
                                ),
                                true
                            ),
                    ]
                );

                $order->update([

                    'status' =>
                        'failed',

                    'provider_message' =>
                        'QRIS URL tidak tersedia dari Midtrans.',

                ]);

                return redirect()

                    ->route(
                        'topup.result',
                        $order->order_id
                    )

                    ->with(
                        'error',
                        'QRIS tidak berhasil dibuat.'
                    );
            }

            /**
             * Redirect ke halaman pembayaran.
             */
            return redirect()

                ->route(
                    'topup.payment',
                    $order->order_id
                );

        } catch (\Throwable $e) {

            /**
             * Log error.
             */
            Log::error(
                'Midtrans Core API error.',
                [

                    'order_id' =>
                        $order->order_id,

                    'message' =>
                        $e->getMessage(),

                    'trace' =>
                        $e->getTraceAsString(),

                ]
            );

            /**
             * Update order.
             */
            $order->update([

                'status' =>
                    'failed',

                'provider_message' =>
                    $e->getMessage(),

            ]);

            return redirect()

                ->route(
                    'topup.result',
                    $order->order_id
                )

                ->with(
                    'error',
                    'Pembayaran gagal dibuat. Silakan coba lagi.'
                );
        }
    }

    /**
     * Halaman pembayaran QRIS.
     */
    public function payment(
        string $orderId
    ) {
        $order =
            TopUpOrder::where(
                'order_id',
                $orderId
            )->firstOrFail();

        /**
         * Response Midtrans.
         */
        $response =
            $order->provider_response
            ?? [];

        /**
         * Ambil QR URL.
         */
        $qrCodeUrl =
            null;

        if (
            isset(
                $response['actions']
            )
            &&
            is_array(
                $response['actions']
            )
        ) {

            foreach (
                $response['actions']
                as $action
            ) {

                if (

                    isset(
                        $action['name']
                    )

                    &&

                    $action['name']
                        ===
                        'generate-qr-code'

                    &&

                    isset(
                        $action['url']
                    )

                ) {

                    $qrCodeUrl =
                        $action['url'];

                    break;
                }
            }
        }

        return view(
            'topup.payment',
            [

                'order' =>
                    $order,

                'qrCodeUrl' =>
                    $qrCodeUrl,

            ]
        );
    }

    /**
     * Notification dari Midtrans.
     *
     * URL ini dipanggil Midtrans.
     */
    public function midtransNotification(
        Request $request,
        DigiflazzService $digiflazz
    ) {
        $notification =
            $request->all();

        Log::info(
            'Midtrans notification received.',
            $notification
        );

        /**
         * Data utama.
         */
        $orderId =
            $notification['order_id']
            ?? null;

        $statusCode =
            $notification['status_code']
            ?? null;

        $grossAmount =
            $notification['gross_amount']
            ?? null;

        $signatureKey =
            $notification['signature_key']
            ?? null;

        /**
         * Order ID wajib ada.
         */
        if (!$orderId) {

            return response()->json(
                [
                    'message' =>
                        'order_id tidak ditemukan.',
                ],
                400
            );
        }

        /**
         * Cari order.
         */
        $order =
            TopUpOrder::where(
                'order_id',
                $orderId
            )->first();

        if (!$order) {

            Log::warning(
                'Midtrans order tidak ditemukan.',
                [
                    'order_id' =>
                        $orderId,
                ]
            );

            return response()->json(
                [
                    'message' =>
                        'Order tidak ditemukan.',
                ],
                404
            );
        }

        /**
         * ============================
         * VALIDASI SIGNATURE MIDTRANS
         * ============================
         */
        $serverKey =
            config(
                'midtrans.server_key'
            );

        $expectedSignature =
            hash(
                'sha512',
                $orderId .
                $statusCode .
                $grossAmount .
                $serverKey
            );

        if (

            !$signatureKey

            ||

            !hash_equals(
                $expectedSignature,
                $signatureKey
            )

        ) {

            Log::warning(
                'Midtrans signature tidak valid.',
                [
                    'order_id' =>
                        $orderId,
                ]
            );

            return response()->json(
                [
                    'message' =>
                        'Invalid signature.',
                ],
                403
            );
        }

        /**
         * Status transaksi.
         */
        $transactionStatus =
            strtolower(
                (string)
                (
                    $notification[
                        'transaction_status'
                    ]
                    ?? ''
                )
            );

        $fraudStatus =
            strtolower(
                (string)
                (
                    $notification[
                        'fraud_status'
                    ]
                    ?? ''
                )
            );

        /**
         * Simpan response Midtrans.
         */
        $order->update([

            'provider_response' =>
                $notification,

        ]);

        /**
         * ============================
         * PENDING
         * ============================
         */
        if (
            $transactionStatus
            ===
            'pending'
        ) {

            $order->update([

                'payment_status' =>
                    'unpaid',

                'status' =>
                    'pending',

            ]);

            return response()->json(
                [
                    'message' =>
                        'Payment pending.',
                ]
            );
        }

        /**
         * ============================
         * SETTLEMENT
         * ============================
         */
        if (
            $transactionStatus
            ===
            'settlement'
        ) {

            /**
             * Jika sudah diproses,
             * jangan kirim Digiflazz lagi.
             */
            if (
                $order->ref_id
                &&
                in_array(
                    $order->status,
                    [
                        'pending',
                        'success',
                    ],
                    true
                )
            ) {

                return response()->json(
                    [
                        'message' =>
                            'Payment already processed.',
                    ]
                );
            }

            /**
             * Tandai paid.
             */
            $order->update([

                'payment_status' =>
                    'paid',

                'paid_at' =>
                    $order->paid_at
                    ?? now(),

            ]);

            /**
             * =========================
             * DIGIFLAZZ
             * =========================
             */
            $refId =
                'TRING-' .
                strtoupper(
                    Str::random(16)
                );

            $customerNo =
                $order->user_id .
                $order->server_id;

            try {

                $result =
                    $digiflazz->transaction(
                        $order->sku,
                        $customerNo,
                        $refId
                    );

                $providerData =
                    $result['data']
                    ?? [];

                $providerStatus =
                    $providerData['status']
                    ?? null;

                $providerMessage =
                    $providerData['message']
                    ?? $result['message']
                    ?? null;

                $providerSn =
                    $providerData['sn']
                    ?? null;

                /**
                 * Default pending.
                 */
                $status =
                    'pending';

                /**
                 * Sukses.
                 */
                if (

                    strtolower(
                        (string)
                        $providerStatus
                    )
                    ===
                    'sukses'

                ) {

                    $status =
                        'success';

                }

                /**
                 * Gagal.
                 */
                if (

                    in_array(

                        strtolower(
                            (string)
                            $providerStatus
                        ),

                        [
                            'gagal',
                            'failed',
                            'error',
                        ],

                        true

                    )

                ) {

                    $status =
                        'failed';

                }

                /**
                 * Update hasil Digiflazz.
                 */
                $order->update([

                    'ref_id' =>
                        $refId,

                    'provider_status' =>
                        $providerStatus,

                    'provider_sn' =>
                        $providerSn,

                    'provider_message' =>
                        $providerMessage,

                    /**
                     * Untuk saat ini
                     * response Digiflazz
                     * menggantikan response
                     * Midtrans.
                     */
                    'provider_response' =>
                        $result,

                    'status' =>
                        $status,

                    'completed_at' =>
                        $status === 'success'
                            ? now()
                            : null,

                ]);

            } catch (\Throwable $e) {

                Log::error(
                    'Digiflazz transaction error.',
                    [

                        'order_id' =>
                            $order->order_id,

                        'message' =>
                            $e->getMessage(),

                    ]
                );

                /**
                 * Pembayaran tetap PAID.
                 *
                 * Hanya fulfillment yang
                 * gagal / belum selesai.
                 */
                $order->update([

                    'ref_id' =>
                        $refId,

                    'status' =>
                        'pending',

                    'provider_message' =>
                        $e->getMessage(),

                ]);
            }

            return response()->json(
                [
                    'message' =>
                        'Payment settlement processed.',
                ]
            );
        }

        /**
         * ============================
         * CAPTURE
         * ============================
         */
        if (
            $transactionStatus
            ===
            'capture'
        ) {

            if (
                $fraudStatus ===
                'accept'
            ) {

                $order->update([

                    'payment_status' =>
                        'paid',

                    'paid_at' =>
                        $order->paid_at
                        ?? now(),

                ]);

            }

            return response()->json(
                [
                    'message' =>
                        'Capture processed.',
                ]
            );
        }

        /**
         * ============================
         * EXPIRE
         * ============================
         */
        if (
            $transactionStatus
            ===
            'expire'
        ) {

            $order->update([

                'payment_status' =>
                    'failed',

                'status' =>
                    'failed',

                'provider_status' =>
                    'expire',

                'provider_message' =>
                    'Pembayaran telah kedaluwarsa.',

            ]);

            return response()->json(
                [
                    'message' =>
                        'Payment expired.',
                ]
            );
        }

        /**
         * ============================
         * DENY
         * ============================
         */
        if (
            $transactionStatus
            ===
            'deny'
        ) {

            $order->update([

                'payment_status' =>
                    'failed',

                'status' =>
                    'failed',

                'provider_status' =>
                    'deny',

                'provider_message' =>
                    'Pembayaran ditolak.',

            ]);

            return response()->json(
                [
                    'message' =>
                        'Payment denied.',
                ]
            );
        }

        /**
         * ============================
         * CANCEL
         * ============================
         */
        if (
            $transactionStatus
            ===
            'cancel'
        ) {

            $order->update([

                'payment_status' =>
                    'failed',

                'status' =>
                    'failed',

                'provider_status' =>
                    'cancel',

                'provider_message' =>
                    'Pembayaran dibatalkan.',

            ]);

            return response()->json(
                [
                    'message' =>
                        'Payment cancelled.',
                ]
            );
        }

        /**
         * Status lain.
         */
        return response()->json(
            [
                'message' =>
                    'Notification received.',
            ]
        );
    }

    /**
     * Simulasi pembayaran berhasil.
     *
     * TESTING SAJA.
     *
     * Jangan digunakan untuk production.
     */
    public function paymentSuccess(
        string $orderId,
        DigiflazzService $digiflazz
    ) {
        $order =
            TopUpOrder::where(
                'order_id',
                $orderId
            )->firstOrFail();

        /**
         * Jika sudah sukses.
         */
        if (
            $order->status ===
            'success'
        ) {

            return redirect()
                ->route(
                    'topup.result',
                    $order->order_id
                );
        }

        /**
         * Tandai paid.
         */
        $order->update([

            'payment_status' =>
                'paid',

            'paid_at' =>
                now(),

        ]);

        /**
         * Reference ID Digiflazz.
         */
        $refId =
            'TRING-' .
            strtoupper(
                Str::random(16)
            );

        /**
         * Customer number.
         */
        $customerNo =
            $order->user_id .
            $order->server_id;

        try {

            $result =
                $digiflazz->transaction(
                    $order->sku,
                    $customerNo,
                    $refId
                );

            $providerData =
                $result['data']
                ?? [];

            $providerStatus =
                $providerData['status']
                ?? null;

            $providerMessage =
                $providerData['message']
                ?? $result['message']
                ?? null;

            $providerSn =
                $providerData['sn']
                ?? null;

            $status =
                'pending';

            if (
                strtolower(
                    (string)
                    $providerStatus
                )
                ===
                'sukses'
            ) {

                $status =
                    'success';

            }

            if (
                in_array(

                    strtolower(
                        (string)
                        $providerStatus
                    ),

                    [
                        'gagal',
                        'failed',
                        'error',
                    ],

                    true

                )
            ) {

                $status =
                    'failed';

            }

            $order->update([

                'ref_id' =>
                    $refId,

                'provider_status' =>
                    $providerStatus,

                'provider_sn' =>
                    $providerSn,

                'provider_message' =>
                    $providerMessage,

                'provider_response' =>
                    $providerData,

                'status' =>
                    $status,

                'completed_at' =>
                    $status === 'success'
                        ? now()
                        : null,

            ]);

        } catch (\Throwable $e) {

            Log::error(
                'Digiflazz testing transaction error.',
                [

                    'order_id' =>
                        $order->order_id,

                    'message' =>
                        $e->getMessage(),

                ]
            );

            $order->update([

                'ref_id' =>
                    $refId,

                'status' =>
                    'pending',

                'provider_message' =>
                    $e->getMessage(),

            ]);
        }

        return redirect()
            ->route(
                'topup.result',
                $order->order_id
            );
    }

    /**
     * Hasil transaksi.
     */
    public function result(
        string $orderId
    ) {
        $order =
            TopUpOrder::where(
                'order_id',
                $orderId
            )->firstOrFail();

        return view(
            'topup.result',
            compact('order')
        );
    }

public function checkMlbb(
    Request $request,
    DigiflazzService $digiflazz
) {
    $validated = $request->validate([
        'user_id' => [
            'required',
            'string',
            'max:30',
            'regex:/^[0-9]+$/',
        ],

        'server_id' => [
            'required',
            'string',
            'max:10',
            'regex:/^[0-9]+$/',
        ],
    ]);

    $userId = $validated['user_id'];
    $serverId = $validated['server_id'];

    try {

        $result = $digiflazz->checkMobileLegends(
            $userId,
            $serverId
        );

        if (!$result['success']) {

            return response()->json([
                'success' => false,
                'message' =>
                    $result['message']
                    ?? 'ID Mobile Legends tidak ditemukan.',
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'ID Mobile Legends ditemukan.',
            'data' => [
                'user_id' => $userId,
                'server_id' => $serverId,
                'nickname' => $result['nickname'],
            ],
        ]);

    } catch (\Throwable $e) {

        Log::error('MLBB Check Error', [
            'user_id' => $userId,
            'server_id' => $serverId,
            'message' => $e->getMessage(),
        ]);

        return response()->json([
            'success' => false,
            'message' =>
                'Terjadi kesalahan saat mengecek ID Mobile Legends.',
        ], 500);
    }
}

}