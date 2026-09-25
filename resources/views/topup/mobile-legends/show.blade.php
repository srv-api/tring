<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        rel="icon"
        type="image/x-icon"
        href="{{ asset('tring.png') }}"
    >

    <title>Top Up Mobile Legends - Tring</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f7f7f8;
            color: #111827;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            background: #7F0079;
            height: 64px;
            display: flex;
            align-items: center;
            padding: 0 32px;
            color: white;
        }

        .header-inner {
            width: 100%;
            max-width: 1180px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 9px;
            color: white;
            text-decoration: none;
            font-size: 20px;
            font-weight: 800;
        }

        .logo-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: white;
            color: #7F0079;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 800;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav a {
            color: rgba(255, 255, 255, .88);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }

        .nav a:hover,
        .nav a.active {
            color: white;
        }

        .profile {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .15);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 17px;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            max-width: 1000px;
            margin: 38px auto;
            padding: 0 20px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #6b7280;
            font-size: 12px;
            margin-bottom: 18px;
        }

        .breadcrumb a {
            color: #6b7280;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: #7F0079;
        }

        .content {
            display: grid;
            grid-template-columns: 330px 1fr;
            gap: 20px;
            align-items: start;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .03);
        }

        /* =========================
           GAME CARD
        ========================= */

        .game-card {
            padding: 20px;
            position: sticky;
            top: 20px;
        }

        .game-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 11px;
            display: block;
            background: #f3f4f6;
        }

        .game-category {
            display: inline-flex;
            align-items: center;
            margin-top: 16px;
            padding: 5px 9px;
            border-radius: 6px;
            background: #eef2ff;
            color: #4f46e5;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .game-title {
            margin: 9px 0 5px;
            font-size: 21px;
            line-height: 1.3;
            font-weight: 800;
            color: #111827;
        }

        .game-description {
            margin: 0;
            color: #6b7280;
            font-size: 12px;
            line-height: 1.6;
        }

        .secure-info {
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            gap: 9px;
            color: #6b7280;
            font-size: 11px;
            line-height: 1.5;
        }

        .secure-info i {
            color: #16a34a;
            font-size: 15px;
            flex-shrink: 0;
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            padding: 24px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 13px;
            font-size: 14px;
            font-weight: 700;
            color: #111827;
        }

        .step {
            width: 24px;
            height: 24px;
            border-radius: 7px;
            background: #7F0079;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
        }

        /* =========================
           INPUT
        ========================= */

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .input-label {
            font-size: 11px;
            font-weight: 600;
            color: #374151;
        }

        .input {
            width: 100%;
            height: 43px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0 13px;
            outline: none;
            font-family: inherit;
            font-size: 13px;
            color: #111827;
            transition: .2s;
        }

        .input:focus {
            border-color: #7F0079;
            box-shadow: 0 0 0 3px rgba(127, 0, 121, .08);
        }

        .input::placeholder {
            color: #9ca3af;
        }

        .input-note {
            display: block;
            margin-top: 8px;
            color: #9ca3af;
            font-size: 10px;
            line-height: 1.5;
        }

        .two-inputs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        /* =========================
           MLBB CHECKER
        ========================= */

        .mlbb-check {
            margin-top: 12px;
        }

        .check-button {
            width: 100%;
            height: 40px;
            border: 1px solid #7F0079;
            border-radius: 8px;
            background: #ffffff;
            color: #7F0079;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            transition: .2s;
        }

        .check-button:hover {
            background: #fff7fe;
        }

        .check-button:disabled {
            opacity: .65;
            cursor: not-allowed;
        }

        .mlbb-check-result {
            display: none;
            margin-top: 10px;
            padding: 11px 12px;
            border-radius: 8px;
            font-size: 11px;
            line-height: 1.5;
        }

        .mlbb-check-result.show {
            display: block;
        }

        .mlbb-check-result.success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .mlbb-check-result.error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .mlbb-account {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .mlbb-account-icon {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            background: #dcfce7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #15803d;
            flex-shrink: 0;
        }

        .mlbb-account-name {
            font-weight: 800;
            color: #166534;
        }

        .mlbb-account-id {
            margin-top: 2px;
            color: #6b7280;
            font-size: 9px;
        }

        /* =========================
           NOMINAL
        ========================= */

        .nominal-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .nominal-option {
            position: relative;
        }

        .nominal-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .nominal-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 82px;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            cursor: pointer;
            transition: .2s;
            background: white;
            text-align: center;
        }

        .nominal-label:hover {
            border-color: #7F0079;
        }

        .nominal-option input:checked + .nominal-label {
            border-color: #7F0079;
            background: #fff7fe;
            box-shadow: 0 0 0 1px #7F0079;
        }

        .diamond-icon {
            color: #2563eb;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .diamond {
            font-size: 11px;
            line-height: 1.4;
            font-weight: 700;
            color: #111827;
        }

        .price {
            margin-top: 4px;
            color: #6b7280;
            font-size: 10px;
        }

        /* =========================
           PAYMENT
        ========================= */

        .payment-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .payment-option {
            position: relative;
        }

        .payment-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .payment-label {
            min-height: 58px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: .2s;
        }

        .payment-label:hover {
            border-color: #7F0079;
        }

        .payment-option input:checked + .payment-label {
            border-color: #7F0079;
            background: #fff7fe;
            box-shadow: 0 0 0 1px #7F0079;
        }

        .payment-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7F0079;
            font-size: 17px;
            flex-shrink: 0;
        }

        .payment-name {
            font-size: 12px;
            font-weight: 700;
            color: #111827;
        }

        .payment-description {
            margin-top: 2px;
            color: #9ca3af;
            font-size: 9px;
            line-height: 1.4;
        }

        /* =========================
           SUMMARY
        ========================= */

        .summary {
            border-top: 1px solid #e5e7eb;
            padding-top: 18px;
            margin-top: 20px;
        }

        .summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 9px;
            font-size: 12px;
        }

        .summary-label {
            color: #6b7280;
        }

        .summary-value {
            font-weight: 600;
            color: #111827;
            text-align: right;
            max-width: 60%;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .summary-total {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            margin-top: 12px;
            border-top: 1px dashed #d1d5db;
        }

        .total-label {
            font-size: 13px;
            font-weight: 700;
        }

        .total-value {
            color: #7F0079;
            font-size: 18px;
            font-weight: 800;
        }

        /* =========================
           SUBMIT
        ========================= */

        .submit-button {
            width: 100%;
            height: 46px;
            margin-top: 18px;
            border: 0;
            border-radius: 9px;
            background: #7F0079;
            color: white;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .submit-button:hover {
            background: #690063;
        }

        .submit-button:disabled {
            opacity: .7;
            cursor: not-allowed;
        }

        .button-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .button-spinner {
            display: none;
        }

        .submit-button.loading .button-icon {
            display: none;
        }

        .submit-button.loading .button-spinner {
            display: inline-block;
            animation: spin .8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* =========================
           ERROR
        ========================= */

        .error-message {
            display: none;
            margin-top: 6px;
            color: #dc2626;
            font-size: 10px;
        }

        .error-message.show {
            display: block;
        }

        .server-errors {
            margin-bottom: 20px;
            padding: 12px 14px;
            border: 1px solid #fecaca;
            border-radius: 9px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 12px;
            line-height: 1.6;
        }

        .server-errors ul {
            margin: 0;
            padding-left: 18px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {
            .header {
                padding: 0 18px;
            }

            .nav {
                display: none;
            }

            .main {
                margin: 25px auto;
                padding: 0 15px;
            }

            .content {
                grid-template-columns: 1fr;
            }

            .game-card {
                position: static;
            }

            .game-image {
                height: 200px;
            }
        }

        @media (max-width: 500px) {
            .form-card,
            .game-card {
                padding: 17px;
            }

            .nominal-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .payment-grid {
                grid-template-columns: 1fr;
            }

            .two-inputs {
                grid-template-columns: 1fr;
            }

            .breadcrumb {
                font-size: 11px;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
         HEADER
    ========================= --}}

    <header class="header">
        <div class="header-inner">

            <a href="{{ url('/') }}" class="logo">
                <span class="logo-icon">T</span>
                <span>Tring.id</span>
            </a>

            <nav class="nav">
                <a href="{{ url('/') }}">
                    Home
                </a>

                <a
                    href="{{ route('topup.show', 'mobile-legends') }}"
                    class="active"
                >
                    Top Up
                </a>

                <a href="#">
                    Riwayat
                </a>

                <a href="#">
                    Bantuan
                </a>
            </nav>

            <div class="profile">
                <i class="bi bi-person"></i>
            </div>

        </div>
    </header>


    {{-- =========================
         MAIN
    ========================= --}}

    <main class="main">

        {{-- BREADCRUMB --}}

        <div class="breadcrumb">

            <a
                href="{{ route('topup.show', 'mobile-legends') }}"
            >
                Top Up
            </a>

            <i class="bi bi-chevron-right"></i>

            <span>
                Mobile Legends
            </span>

        </div>


        {{-- CONTENT --}}

        <div class="content">

            {{-- =========================
                 GAME INFORMATION
            ========================= --}}

            <div class="card game-card">

                <img
                    src="{{ asset('games/ml.webp') }}"
                    alt="Mobile Legends"
                    class="game-image"
                >

                <span class="game-category">
                    MOBA
                </span>

                <h1 class="game-title">
                    Mobile Legends
                </h1>

                <p class="game-description">
                    Top up Diamond Mobile Legends dengan cepat,
                    mudah, dan aman melalui Tring.id.
                </p>

                <div class="secure-info">

                    <i class="bi bi-shield-check"></i>

                    <span>
                        Transaksi aman dan pembayaran diproses
                        dengan sistem yang terpercaya.
                    </span>

                </div>

            </div>


            {{-- =========================
                 FORM CARD
            ========================= --}}

            <div class="card form-card">

                {{-- SERVER ERRORS --}}

                @if ($errors->any())

                    <div class="server-errors">

                        <strong>
                            Terjadi kesalahan:
                        </strong>

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- FORM --}}

                <form
                    action="{{ route('topup.order') }}"
                    method="POST"
                    id="topupForm"
                >

                    @csrf

                    {{-- GAME --}}

                    <input
                        type="hidden"
                        name="game"
                        value="mobile-legends"
                    >


                    {{-- =========================
                         STEP 1
                    ========================= --}}

                    <div class="section">

                        <div class="section-title">

                            <span class="step">
                                1
                            </span>

                            Masukkan Data Akun

                        </div>


                        <div class="two-inputs">

                            {{-- USER ID --}}

                            <div class="input-group">

                                <label
                                    class="input-label"
                                    for="userId"
                                >
                                    User ID
                                </label>

                                <input
                                    type="text"
                                    name="user_id"
                                    id="userId"
                                    class="input"
                                    placeholder="Contoh: 123456789"
                                    inputmode="numeric"
                                    autocomplete="off"
                                    value="{{ old('user_id') }}"
                                    required
                                >

                                <span
                                    id="userIdError"
                                    class="error-message"
                                >
                                    Silakan masukkan User ID.
                                </span>

                            </div>


                            {{-- SERVER ID --}}

                            <div class="input-group">

                                <label
                                    class="input-label"
                                    for="serverId"
                                >
                                    Server ID
                                </label>

                                <input
                                    type="text"
                                    name="server_id"
                                    id="serverId"
                                    class="input"
                                    placeholder="Contoh: 1234"
                                    inputmode="numeric"
                                    autocomplete="off"
                                    value="{{ old('server_id') }}"
                                    required
                                >

                                <span
                                    id="serverIdError"
                                    class="error-message"
                                >
                                    Silakan masukkan Server ID.
                                </span>

                            </div>

                        </div>


                        <span class="input-note">
                            User ID dan Server ID dapat ditemukan pada
                            profil akun Mobile Legends kamu.
                        </span>


                        {{-- =========================
                             MLBB CHECKER
                        ========================= --}}

                        <div class="mlbb-check">

                            <button
                                type="button"
                                id="checkMlbbButton"
                                class="check-button"
                            >

                                <i class="bi bi-search"></i>

                                <span id="checkMlbbText">
                                    Cek ID
                                </span>

                            </button>


                            <div
                                id="mlbbCheckResult"
                                class="mlbb-check-result"
                            ></div>

                        </div>


                        {{-- HIDDEN CHECKER DATA --}}

                        <input
                            type="hidden"
                            name="nickname"
                            id="mlbbNickname"
                            value=""
                        >

                        <input
                            type="hidden"
                            name="mlbb_verified"
                            id="mlbbVerified"
                            value="0"
                        >

                    </div>


                    {{-- =========================
                         STEP 2
                    ========================= --}}

                    <div class="section">

                        <div class="section-title">

                            <span class="step">
                                2
                            </span>

                            Pilih Nominal Diamond

                        </div>


                        <div class="nominal-grid">

                            @forelse ($products as $product)

                                @if ($product['status'])

                                    <div class="nominal-option">

                                        <input
                                            type="radio"
                                            name="sku"
                                            id="product-{{ $loop->index }}"
                                            value="{{ $product['code'] }}"
                                            data-price="{{ $product['price'] }}"
                                            data-label="{{ $product['name'] }}"
                                            @checked(old('sku') === $product['code'])
                                            required
                                        >

                                        <label
                                            for="product-{{ $loop->index }}"
                                            class="nominal-label"
                                        >

                                            <i class="bi bi-gem diamond-icon"></i>

                                            <span class="diamond">
                                                {{ $product['name'] }}
                                            </span>

                                            <span class="price">
                                                Rp{{ number_format(
                                                    $product['price'],
                                                    0,
                                                    ',',
                                                    '.'
                                                ) }}
                                            </span>

                                        </label>

                                    </div>

                                @endif

                            @empty

                                <div style="
                                    grid-column: 1 / -1;
                                    padding: 20px;
                                    text-align: center;
                                    color: #6b7280;
                                    font-size: 12px;
                                    border: 1px dashed #d1d5db;
                                    border-radius: 9px;
                                ">
                                    Produk Mobile Legends
                                    sedang tidak tersedia.
                                </div>

                            @endforelse

                        </div>


                        <span
                            id="nominalError"
                            class="error-message"
                        >
                            Silakan pilih nominal Diamond.
                        </span>

                    </div>


                    {{-- =========================
                         STEP 3
                    ========================= --}}

                    <div class="section">

                        <div class="section-title">

                            <span class="step">
                                3
                            </span>

                            Pilih Pembayaran

                        </div>


                        <div class="payment-grid">

                            {{-- QRIS --}}

                            <div class="payment-option">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    id="qris"
                                    value="QRIS"
                                    @checked(old('payment_method') === 'QRIS')
                                    required
                                >

                                <label
                                    for="qris"
                                    class="payment-label"
                                >

                                    <div class="payment-icon">
                                        <i class="bi bi-qr-code"></i>
                                    </div>

                                    <div>

                                        <div class="payment-name">
                                            QRIS
                                        </div>

                                        <div class="payment-description">
                                            Scan menggunakan
                                            aplikasi pembayaran
                                        </div>

                                    </div>

                                </label>

                            </div>


                            {{-- E-WALLET --}}

                            <div class="payment-option">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    id="ewallet"
                                    value="E-Wallet"
                                    @checked(old('payment_method') === 'E-Wallet')
                                >

                                <label
                                    for="ewallet"
                                    class="payment-label"
                                >

                                    <div class="payment-icon">
                                        <i class="bi bi-wallet2"></i>
                                    </div>

                                    <div>

                                        <div class="payment-name">
                                            E-Wallet
                                        </div>

                                        <div class="payment-description">
                                            Pembayaran melalui
                                            E-Wallet
                                        </div>

                                    </div>

                                </label>

                            </div>

                        </div>


                        <span
                            id="paymentError"
                            class="error-message"
                        >
                            Silakan pilih metode pembayaran.
                        </span>

                    </div>


                    {{-- =========================
                         HIDDEN PRODUCT DATA
                    ========================= --}}

                    <input
                        type="hidden"
                        name="product_name"
                        id="productName"
                        value="{{ old('product_name') }}"
                    >

                    <input
                        type="hidden"
                        name="price"
                        id="productPrice"
                        value="{{ old('price') }}"
                    >


                    {{-- =========================
                         SUMMARY
                    ========================= --}}

                    <div class="summary">

                        <div class="summary-row">

                            <span class="summary-label">
                                Game
                            </span>

                            <span class="summary-value">
                                Mobile Legends
                            </span>

                        </div>


                        <div class="summary-row">

                            <span class="summary-label">
                                User ID
                            </span>

                            <span
                                class="summary-value"
                                id="summaryUserId"
                            >
                                -
                            </span>

                        </div>


                        <div class="summary-row">

                            <span class="summary-label">
                                Server ID
                            </span>

                            <span
                                class="summary-value"
                                id="summaryServerId"
                            >
                                -
                            </span>

                        </div>


                        <div class="summary-row">

                            <span class="summary-label">
                                Nickname
                            </span>

                            <span
                                class="summary-value"
                                id="summaryNickname"
                            >
                                -
                            </span>

                        </div>


                        <div class="summary-row">

                            <span class="summary-label">
                                Nominal
                            </span>

                            <span
                                class="summary-value"
                                id="summaryNominal"
                            >
                                -
                            </span>

                        </div>


                        <div class="summary-row">

                            <span class="summary-label">
                                Pembayaran
                            </span>

                            <span
                                class="summary-value"
                                id="summaryPayment"
                            >
                                -
                            </span>

                        </div>


                        <div class="summary-total">

                            <span class="total-label">
                                Total Pembayaran
                            </span>

                            <span
                                class="total-value"
                                id="summaryPrice"
                            >
                                Rp0
                            </span>

                        </div>

                    </div>


                    {{-- =========================
                         SUBMIT
                    ========================= --}}

                    <button
                        type="submit"
                        class="submit-button"
                        id="submitButton"
                    >

                        <span class="button-content">

                            <i class="bi bi-lightning-charge-fill button-icon"></i>

                            <i class="bi bi-arrow-repeat button-spinner"></i>

                            <span id="buttonText">
                                Lanjutkan Pembayaran
                            </span>

                        </span>

                    </button>

                </form>

            </div>

        </div>

    </main>


    {{-- =========================
         JAVASCRIPT
    ========================= --}}

    <script>
        const form = document.getElementById('topupForm');

        const userIdInput = document.getElementById('userId');
        const serverIdInput = document.getElementById('serverId');

        const productNameInput = document.getElementById('productName');
        const productPriceInput = document.getElementById('productPrice');

        const summaryUserId = document.getElementById('summaryUserId');
        const summaryServerId = document.getElementById('summaryServerId');
        const summaryNickname = document.getElementById('summaryNickname');
        const summaryNominal = document.getElementById('summaryNominal');
        const summaryPayment = document.getElementById('summaryPayment');
        const summaryPrice = document.getElementById('summaryPrice');

        const submitButton = document.getElementById('submitButton');
        const buttonText = document.getElementById('buttonText');

        const checkMlbbButton = document.getElementById('checkMlbbButton');
        const checkMlbbText = document.getElementById('checkMlbbText');
        const mlbbCheckResult = document.getElementById('mlbbCheckResult');

        const mlbbNickname = document.getElementById('mlbbNickname');
        const mlbbVerified = document.getElementById('mlbbVerified');


        /* =========================
           FORMAT RUPIAH
        ========================= */

        function formatRupiah(value) {

            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);

        }


        /* =========================
           RESET MLBB VERIFICATION
        ========================= */

        function resetMlbbVerification() {

            mlbbVerified.value = '0';
            mlbbNickname.value = '';

            summaryNickname.textContent = '-';

            mlbbCheckResult.className =
                'mlbb-check-result';

            mlbbCheckResult.innerHTML = '';

        }


        /* =========================
           UPDATE SUMMARY
        ========================= */

        function updateSummary() {

            summaryUserId.textContent =
                userIdInput.value.trim() || '-';

            summaryServerId.textContent =
                serverIdInput.value.trim() || '-';


            /*
             * PRODUCT
             */

            const selectedProduct =
                document.querySelector(
                    'input[name="sku"]:checked'
                );


            if (selectedProduct) {

                const productLabel =
                    selectedProduct.dataset.label;

                const productPrice =
                    Number(selectedProduct.dataset.price);


                summaryNominal.textContent =
                    productLabel;

                summaryPrice.textContent =
                    formatRupiah(productPrice);


                productNameInput.value =
                    productLabel;

                productPriceInput.value =
                    productPrice;

            } else {

                summaryNominal.textContent =
                    '-';

                summaryPrice.textContent =
                    'Rp0';

                productNameInput.value =
                    '';

                productPriceInput.value =
                    '';

            }


            /*
             * PAYMENT METHOD
             */

            const selectedPayment =
                document.querySelector(
                    'input[name="payment_method"]:checked'
                );


            summaryPayment.textContent =
                selectedPayment
                    ? selectedPayment.value
                    : '-';

        }


        /* =========================
           CHECK MLBB
        ========================= */

        checkMlbbButton.addEventListener('click', async function () {

            const userId =
                userIdInput.value.trim();

            const serverId =
                serverIdInput.value.trim();


            /*
             * VALIDASI INPUT
             */

            if (!userId) {

                document
                    .getElementById('userIdError')
                    .classList.add('show');

                userIdInput.focus();

                return;

            }


            if (!serverId) {

                document
                    .getElementById('serverIdError')
                    .classList.add('show');

                serverIdInput.focus();

                return;

            }


            /*
             * VALIDASI ANGKA
             */

            if (!/^[0-9]+$/.test(userId)) {

                mlbbCheckResult.className =
                    'mlbb-check-result show error';

                mlbbCheckResult.innerHTML =
                    '<i class="bi bi-exclamation-circle"></i> ' +
                    'User ID hanya boleh berisi angka.';

                return;

            }


            if (!/^[0-9]+$/.test(serverId)) {

                mlbbCheckResult.className =
                    'mlbb-check-result show error';

                mlbbCheckResult.innerHTML =
                    '<i class="bi bi-exclamation-circle"></i> ' +
                    'Server ID hanya boleh berisi angka.';

                return;

            }


            /*
             * RESET
             */

            resetMlbbVerification();


            /*
             * LOADING
             */

            checkMlbbButton.disabled = true;

            checkMlbbText.textContent =
                'Memeriksa...';


            try {

                const response =
                    await fetch(
                        "{{ route('topup.check.mlbb') }}",
                        {
                            method: 'POST',

                            headers: {
                                'Content-Type': 'application/json',

                                'Accept': 'application/json',

                                'X-CSRF-TOKEN':
                                    document
                                        .querySelector(
                                            'meta[name="csrf-token"]'
                                        )?.getAttribute('content')
                                    || '{{ csrf_token() }}'
                            },

                            body: JSON.stringify({
                                user_id: userId,
                                server_id: serverId
                            })
                        }
                    );


                const data =
                    await response.json();


                if (!response.ok || !data.success) {

                    throw new Error(
                        data.message ||
                        'ID Mobile Legends tidak ditemukan.'
                    );

                }


                /*
                 * SUCCESS
                 */

                const nickname =
                    data.data.nickname || '-';


                mlbbNickname.value =
                    nickname;

                mlbbVerified.value =
                    '1';


                summaryNickname.textContent =
                    nickname;


                mlbbCheckResult.className =
                    'mlbb-check-result show success';


                mlbbCheckResult.innerHTML = `

                    <div class="mlbb-account">

                        <div class="mlbb-account-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>

                        <div>

                            <div class="mlbb-account-name">
                                ${escapeHtml(nickname)}
                            </div>

                            <div class="mlbb-account-id">
                                ID ${escapeHtml(userId)}
                                • Server ${escapeHtml(serverId)}
                            </div>

                        </div>

                    </div>

                `;

            } catch (error) {

                resetMlbbVerification();


                mlbbCheckResult.className =
                    'mlbb-check-result show error';


                mlbbCheckResult.innerHTML = `

                    <i class="bi bi-exclamation-circle"></i>
                    ${escapeHtml(
                        error.message ||
                        'Gagal memeriksa ID Mobile Legends.'
                    )}

                `;

            } finally {

                checkMlbbButton.disabled = false;

                checkMlbbText.textContent =
                    'Cek ID';

            }

        });


        /* =========================
           ESCAPE HTML
        ========================= */

        function escapeHtml(value) {

            return String(value)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');

        }


        /* =========================
           USER ID EVENT
        ========================= */

        userIdInput.addEventListener('input', function () {

            updateSummary();

            document
                .getElementById('userIdError')
                .classList.remove('show');

            resetMlbbVerification();

        });


        /* =========================
           SERVER ID EVENT
        ========================= */

        serverIdInput.addEventListener('input', function () {

            updateSummary();

            document
                .getElementById('serverIdError')
                .classList.remove('show');

            resetMlbbVerification();

        });


        /* =========================
           SKU EVENT
        ========================= */

        document
            .querySelectorAll('input[name="sku"]')
            .forEach(function (input) {

                input.addEventListener('change', function () {

                    updateSummary();

                    document
                        .getElementById('nominalError')
                        .classList.remove('show');

                });

            });


        /* =========================
           PAYMENT EVENT
        ========================= */

        document
            .querySelectorAll('input[name="payment_method"]')
            .forEach(function (input) {

                input.addEventListener('change', function () {

                    updateSummary();

                    document
                        .getElementById('paymentError')
                        .classList.remove('show');

                });

            });


        /* =========================
           FORM SUBMIT
        ========================= */

        form.addEventListener('submit', function (event) {

            let valid = true;


            /*
             * USER ID
             */

            if (!userIdInput.value.trim()) {

                document
                    .getElementById('userIdError')
                    .classList.add('show');

                userIdInput.focus();

                valid = false;

            } else {

                document
                    .getElementById('userIdError')
                    .classList.remove('show');

            }


            /*
             * SERVER ID
             */

            if (!serverIdInput.value.trim()) {

                document
                    .getElementById('serverIdError')
                    .classList.add('show');

                if (valid) {
                    serverIdInput.focus();
                }

                valid = false;

            } else {

                document
                    .getElementById('serverIdError')
                    .classList.remove('show');

            }


            /*
             * MLBB VERIFICATION
             */

            if (mlbbVerified.value !== '1') {

                mlbbCheckResult.className =
                    'mlbb-check-result show error';

                mlbbCheckResult.innerHTML =
                    '<i class="bi bi-exclamation-circle"></i> ' +
                    'Silakan cek ID Mobile Legends terlebih dahulu.';

                if (valid) {
                    checkMlbbButton.focus();
                }

                valid = false;

            }


            /*
             * PRODUCT
             */

            const selectedProduct =
                document.querySelector(
                    'input[name="sku"]:checked'
                );


            if (!selectedProduct) {

                document
                    .getElementById('nominalError')
                    .classList.add('show');

                valid = false;

            } else {

                document
                    .getElementById('nominalError')
                    .classList.remove('show');

            }


            /*
             * PAYMENT
             */

            const selectedPayment =
                document.querySelector(
                    'input[name="payment_method"]:checked'
                );


            if (!selectedPayment) {

                document
                    .getElementById('paymentError')
                    .classList.add('show');

                valid = false;

            } else {

                document
                    .getElementById('paymentError')
                    .classList.remove('show');

            }


            /*
             * STOP
             */

            if (!valid) {

                event.preventDefault();

                return;

            }


            /*
             * HIDDEN PRODUCT DATA
             */

            productNameInput.value =
                selectedProduct.dataset.label;

            productPriceInput.value =
                selectedProduct.dataset.price;


            /*
             * LOADING
             */

            submitButton.disabled = true;

            submitButton.classList.add('loading');

            buttonText.textContent =
                'Memproses...';

            /*
             * Jangan menggunakan event.preventDefault()
             * jika data sudah valid.
             *
             * Form akan POST normal ke Laravel.
             */

        });


        /* =========================
           INITIAL SUMMARY
        ========================= */

        updateSummary();

    </script>

</body>

</html>

