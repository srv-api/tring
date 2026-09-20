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
        Status Pesanan - Tring.id
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

        .wrapper {

            width: 100%;

            max-width: 520px;

        }

        .card {

            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 20px;

            padding: 30px;

            box-shadow:
                0 10px 30px
                rgba(15, 23, 42, .06);

        }

        .status-icon {

            width: 64px;

            height: 64px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 18px;

            font-size: 28px;

            background: #f3f4f6;

        }

        .title {

            text-align: center;

            margin: 0 0 8px;

            font-size: 25px;

            font-weight: 800;

        }

        .subtitle {

            text-align: center;

            margin: 0 0 25px;

            color: #6b7280;

            font-size: 14px;

            line-height: 1.6;

        }

        .detail {

            background: #f8fafc;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            padding: 16px;

        }

        .row {

            display: flex;

            justify-content: space-between;

            gap: 15px;

            padding: 8px 0;

            font-size: 14px;

        }

        .label {

            color: #6b7280;

        }

        .value {

            text-align: right;

            font-weight: 600;

        }

        .success {

            color: #15803d;

        }

        .pending {

            color: #c2410c;

        }

        .failed {

            color: #b91c1c;

        }

        .button {

            display: block;

            margin-top: 22px;

            width: 100%;

            text-align: center;

            padding: 13px;

            border-radius: 12px;

            background: #111827;

            color: #ffffff;

            text-decoration: none;

            font-weight: 700;

            font-size: 14px;

        }

    </style>

</head>

<body>

<div class="wrapper">

    <div class="card">

        @if ($order->status === 'success')

            <div class="status-icon">
                ✓
            </div>

            <h1 class="title">
                Top Up Berhasil
            </h1>

            <p class="subtitle">
                Diamond telah berhasil diproses.
            </p>

        @elseif ($order->status === 'failed')

            <div class="status-icon">
                ×
            </div>

            <h1 class="title">
                Transaksi Gagal
            </h1>

            <p class="subtitle">
                Transaksi tidak dapat diproses.
            </p>

        @else

            <div class="status-icon">
                ⏳
            </div>

            <h1 class="title">
                Menunggu Pembayaran
            </h1>

            <p class="subtitle">
                Pembayaran atau proses top up
                masih menunggu konfirmasi.
            </p>

        @endif

        <div class="detail">

            <div class="row">

                <span class="label">
                    Order ID
                </span>

                <span class="value">
                    {{ $order->order_id }}
                </span>

            </div>

            <div class="row">

                <span class="label">
                    Produk
                </span>

                <span class="value">
                    {{ $order->product_name }}
                </span>

            </div>

            <div class="row">

                <span class="label">
                    User ID
                </span>

                <span class="value">
                    {{ $order->user_id }}
                </span>

            </div>

            <div class="row">

                <span class="label">
                    Server
                </span>

                <span class="value">
                    {{ $order->server_id }}
                </span>

            </div>

            <div class="row">

                <span class="label">
                    Harga
                </span>

                <span class="value">
                    Rp {{ number_format($order->price, 0, ',', '.') }}
                </span>

            </div>

            <div class="row">

                <span class="label">
                    Pembayaran
                </span>

                <span class="value">

                    @if ($order->payment_status === 'paid')

                        <span class="success">
                            Lunas
                        </span>

                    @elseif ($order->payment_status === 'failed')

                        <span class="failed">
                            Gagal
                        </span>

                    @else

                        <span class="pending">
                            Belum Dibayar
                        </span>

                    @endif

                </span>

            </div>

            <div class="row">

                <span class="label">
                    Status Top Up
                </span>

                <span class="value">

                    @if ($order->status === 'success')

                        <span class="success">
                            Berhasil
                        </span>

                    @elseif ($order->status === 'failed')

                        <span class="failed">
                            Gagal
                        </span>

                    @else

                        <span class="pending">
                            Diproses
                        </span>

                    @endif

                </span>

            </div>

            @if ($order->provider_sn)

                <div class="row">

                    <span class="label">
                        SN
                    </span>

                    <span class="value">
                        {{ $order->provider_sn }}
                    </span>

                </div>

            @endif

            @if ($order->provider_message)

                <div class="row">

                    <span class="label">
                        Keterangan
                    </span>

                    <span class="value">
                        {{ $order->provider_message }}
                    </span>

                </div>

            @endif

        </div>

        <a
            href="{{ route('topup.index') }}"
            class="button"
        >
            Kembali ke Top Up
        </a>

    </div>

</div>

</body>

</html>