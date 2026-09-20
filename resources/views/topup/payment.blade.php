<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        rel="icon"
        type="image/x-icon"
        href="{{ asset('logo.png') }}"
    >

    <title>
        Pembayaran {{ $order->product_name }} - Tring.id
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {

            margin: 0;

            min-height: 100vh;

            font-family:
                Inter,
                Arial,
                sans-serif;

            background: #f8fafc;

            color: #111827;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 24px;

        }

        .payment-wrapper {

            width: 100%;

            max-width: 460px;

        }

        .payment-card {

            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 20px;

            padding: 28px;

            box-shadow:
                0 10px 30px
                rgba(15, 23, 42, .06);

            text-align: center;

        }

        .eyebrow {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            color: #6b7280;

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 10px;

        }

        .eyebrow-dot {

            width: 7px;

            height: 7px;

            background: #5B61D6;

            border-radius: 50%;

        }

        h1 {

            margin: 0 0 8px;

            font-size: 25px;

            font-weight: 700;

            color: #111827;

        }

        .description {

            margin: 0 0 24px;

            color: #6b7280;

            font-size: 14px;

            line-height: 1.6;

        }

        .order-info {

            background: #f8fafc;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            padding: 16px;

            text-align: left;

            margin-bottom: 24px;

        }

        .info-row {

            display: flex;

            justify-content: space-between;

            gap: 15px;

            padding: 7px 0;

            font-size: 14px;

        }

        .info-label {

            color: #6b7280;

        }

        .info-value {

            color: #111827;

            font-weight: 600;

            text-align: right;

        }

        .amount {

            font-size: 22px;

            font-weight: 800;

            color: #111827;

        }

        .qr-wrapper {

            display: flex;

            justify-content: center;

            align-items: center;

            margin: 10px 0 20px;

        }

        .qr-wrapper img {

            width: 280px;

            height: 280px;

            object-fit: contain;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            padding: 10px;

            background: #ffffff;

        }

        .instruction {

            color: #6b7280;

            font-size: 13px;

            line-height: 1.6;

            margin-bottom: 22px;

        }

        .status {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 8px 13px;

            border-radius: 999px;

            background: #fff7ed;

            color: #c2410c;

            font-size: 12px;

            font-weight: 700;

            margin-bottom: 20px;

        }

        .status-dot {

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: #f97316;

        }

        .back-button {

            display: block;

            width: 100%;

            padding: 13px 16px;

            border-radius: 12px;

            border: 1px solid #e5e7eb;

            background: #ffffff;

            color: #374151;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

        }

        .back-button:hover {

            background: #f9fafb;

        }

        .error {

            padding: 15px;

            border-radius: 12px;

            background: #fef2f2;

            color: #b91c1c;

            font-size: 14px;

            line-height: 1.5;

            margin-bottom: 20px;

        }

        @media (max-width: 480px) {

            body {
                padding: 15px;
            }

            .payment-card {
                padding: 22px 18px;
            }

            .qr-wrapper img {
                width: 240px;
                height: 240px;
            }

            h1 {
                font-size: 22px;
            }

        }

    </style>

</head>

<body>

<div class="payment-wrapper">

    <div class="payment-card">

        <div class="eyebrow">

            <span class="eyebrow-dot"></span>

            Pembayaran QRIS

        </div>

        <h1>
            Selesaikan Pembayaran
        </h1>

        <p class="description">
            Scan QRIS menggunakan aplikasi
            pembayaran yang mendukung QRIS.
        </p>

        <div class="order-info">

            <div class="info-row">

                <span class="info-label">
                    Produk
                </span>

                <span class="info-value">
                    {{ $order->product_name }}
                </span>

            </div>

            <div class="info-row">

                <span class="info-label">
                    Order ID
                </span>

                <span class="info-value">
                    {{ $order->order_id }}
                </span>

            </div>

            <div class="info-row">

                <span class="info-label">
                    User ID
                </span>

                <span class="info-value">
                    {{ $order->user_id }}
                </span>

            </div>

            <div class="info-row">

                <span class="info-label">
                    Server
                </span>

                <span class="info-value">
                    {{ $order->server_id }}
                </span>

            </div>

            <div class="info-row">

                <span class="info-label">
                    Total
                </span>

                <span class="info-value amount">
                    Rp {{ number_format($order->price, 0, ',', '.') }}
                </span>

            </div>

        </div>

        <div class="status">

            <span class="status-dot"></span>

            Menunggu pembayaran

        </div>

        @if ($qrCodeUrl)

            <div class="qr-wrapper">

                <img
                    src="{{ $qrCodeUrl }}"
                    alt="QRIS {{ $order->order_id }}"
                >

            </div>

            <p class="instruction">

                Buka aplikasi mobile banking
                atau e-wallet Anda, lalu pilih
                menu Scan QRIS dan scan kode di atas.

                Setelah pembayaran berhasil,
                sistem akan memproses top up secara otomatis.

            </p>

        @else

            <div class="error">

                QR Code pembayaran tidak tersedia.

                Silakan kembali dan coba membuat
                transaksi baru.

            </div>

        @endif

        <a
            href="{{ route('home') }}"
            class="back-button"
        >
            Kembali ke Home
        </a>
    </div>

</div>

</body>

</html>