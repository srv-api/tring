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

    <title>Top Up Free Fire - Tring.id</title>

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
           GAME INFO
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
            background: #fff7ed;
            color: #ea580c;
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
           FORM
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
            color: #9ca3af;
            font-size: 10px;
            line-height: 1.5;
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
            min-height: 70px;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            cursor: pointer;
            transition: .2s;
            background: white;
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
            color: #f97316;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .diamond {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
        }

        .price {
            margin-top: 3px;
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
           BUTTON
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
            opacity: .6;
            cursor: not-allowed;
        }

        .button-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
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

            .breadcrumb {
                font-size: 11px;
            }
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <header class="header">
        <div class="header-inner">

            <a href="{{ url('/') }}" class="logo">
                <span class="logo-icon">T</span>
                <span>Tring.id</span>
            </a>
            <nav class="nav">
    <a href="{{ route('home') }}">Home</a>

    <a
        href="{{ route('topup.show', 'free-fire') }}"
        class="active"
    >
        Top Up
    </a>

    <a href="#">Riwayat</a>

    <a href="#">Bantuan</a>
</nav>
            <div class="profile">
                <i class="bi bi-person"></i>
            </div>

        </div>
    </header>


    {{-- MAIN --}}
    <main class="main">

        {{-- BREADCRUMB --}}
        <div class="breadcrumb">
                <a href="{{ route('home') }}">
        Home
    </a>


            <i class="bi bi-chevron-right"></i>

            <span>Free Fire</span>
        </div>


        <div class="content">

            {{-- GAME INFORMATION --}}
            <div class="card game-card">

                <img
                    src="{{ asset('games/ff.webp') }}"
                    alt="Free Fire"
                    class="game-image"
                >

                <span class="game-category">
                    Battle Royale
                </span>

                <h1 class="game-title">
                    Free Fire
                </h1>

                <p class="game-description">
                    Top up Diamond Free Fire dengan cepat, mudah,
                    dan aman melalui Tring.id.
                </p>

                <div class="secure-info">
                    <i class="bi bi-shield-check"></i>

                    <span>
                        Transaksi aman dan pembayaran diproses
                        dengan sistem yang terpercaya.
                    </span>
                </div>

            </div>


            {{-- FORM --}}
            <div class="card form-card">

                {{-- PLAYER ID --}}
                <div class="section">

                    <div class="section-title">
                        <span class="step">1</span>
                        Masukkan Player ID
                    </div>

                    <div class="input-group">

                        <label class="input-label">
                            Player ID
                        </label>

                        <input
                            type="text"
                            id="playerId"
                            class="input"
                            placeholder="Masukkan Player ID Free Fire"
                            inputmode="numeric"
                            autocomplete="off"
                        >

                        <span class="input-note">
                            Player ID dapat ditemukan pada halaman profil
                            akun Free Fire kamu.
                        </span>

                        <span
                            id="playerIdError"
                            class="error-message"
                        >
                            Silakan masukkan Player ID.
                        </span>

                    </div>

                </div>


                {{-- NOMINAL --}}
                <div class="section">

                    <div class="section-title">
                        <span class="step">2</span>
                        Pilih Nominal Diamond
                    </div>

                    <div class="nominal-grid">

                        <div class="nominal-option">
                            <input
                                type="radio"
                                name="nominal"
                                id="diamond70"
                                value="70"
                                data-price="10000"
                                data-label="70 Diamond"
                            >

                            <label
                                for="diamond70"
                                class="nominal-label"
                            >
                                <i class="bi bi-gem diamond-icon"></i>
                                <span class="diamond">70 Diamond</span>
                                <span class="price">Rp10.000</span>
                            </label>
                        </div>


                        <div class="nominal-option">
                            <input
                                type="radio"
                                name="nominal"
                                id="diamond140"
                                value="140"
                                data-price="20000"
                                data-label="140 Diamond"
                            >

                            <label
                                for="diamond140"
                                class="nominal-label"
                            >
                                <i class="bi bi-gem diamond-icon"></i>
                                <span class="diamond">140 Diamond</span>
                                <span class="price">Rp20.000</span>
                            </label>
                        </div>


                        <div class="nominal-option">
                            <input
                                type="radio"
                                name="nominal"
                                id="diamond355"
                                value="355"
                                data-price="50000"
                                data-label="355 Diamond"
                            >

                            <label
                                for="diamond355"
                                class="nominal-label"
                            >
                                <i class="bi bi-gem diamond-icon"></i>
                                <span class="diamond">355 Diamond</span>
                                <span class="price">Rp50.000</span>
                            </label>
                        </div>


                        <div class="nominal-option">
                            <input
                                type="radio"
                                name="nominal"
                                id="diamond720"
                                value="720"
                                data-price="100000"
                                data-label="720 Diamond"
                            >

                            <label
                                for="diamond720"
                                class="nominal-label"
                            >
                                <i class="bi bi-gem diamond-icon"></i>
                                <span class="diamond">720 Diamond</span>
                                <span class="price">Rp100.000</span>
                            </label>
                        </div>


                        <div class="nominal-option">
                            <input
                                type="radio"
                                name="nominal"
                                id="diamond1450"
                                value="1450"
                                data-price="200000"
                                data-label="1450 Diamond"
                            >

                            <label
                                for="diamond1450"
                                class="nominal-label"
                            >
                                <i class="bi bi-gem diamond-icon"></i>
                                <span class="diamond">1.450 Diamond</span>
                                <span class="price">Rp200.000</span>
                            </label>
                        </div>


                        <div class="nominal-option">
                            <input
                                type="radio"
                                name="nominal"
                                id="diamond3650"
                                value="3650"
                                data-price="500000"
                                data-label="3650 Diamond"
                            >

                            <label
                                for="diamond3650"
                                class="nominal-label"
                            >
                                <i class="bi bi-gem diamond-icon"></i>
                                <span class="diamond">3.650 Diamond</span>
                                <span class="price">Rp500.000</span>
                            </label>
                        </div>

                    </div>

                    <span
                        id="nominalError"
                        class="error-message"
                    >
                        Silakan pilih nominal Diamond.
                    </span>

                </div>


                {{-- PAYMENT --}}
                <div class="section">

                    <div class="section-title">
                        <span class="step">3</span>
                        Pilih Pembayaran
                    </div>

                    <div class="payment-grid">

                        <div class="payment-option">

                            <input
                                type="radio"
                                name="payment"
                                id="qris"
                                value="QRIS"
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
                                        Scan menggunakan aplikasi pembayaran
                                    </div>
                                </div>

                            </label>

                        </div>


                        <div class="payment-option">

                            <input
                                type="radio"
                                name="payment"
                                id="ewallet"
                                value="E-Wallet"
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
                                        Pembayaran melalui E-Wallet
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


                {{-- SUMMARY --}}
                <div class="summary">

                    <div class="summary-row">
                        <span class="summary-label">
                            Game
                        </span>

                        <span class="summary-value">
                            Free Fire
                        </span>
                    </div>


                    <div class="summary-row">
                        <span class="summary-label">
                            Player ID
                        </span>

                        <span
                            class="summary-value"
                            id="summaryPlayerId"
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


                {{-- BUTTON --}}
                <button
                    type="button"
                    class="submit-button"
                    id="submitButton"
                >
                    <span class="button-content">
                        <i class="bi bi-lightning-charge-fill"></i>
                        Lanjutkan Pembayaran
                    </span>
                </button>

            </div>

        </div>

    </main>


    <script>
        const playerIdInput = document.getElementById('playerId');

        const summaryPlayerId =
            document.getElementById('summaryPlayerId');

        const summaryNominal =
            document.getElementById('summaryNominal');

        const summaryPayment =
            document.getElementById('summaryPayment');

        const summaryPrice =
            document.getElementById('summaryPrice');

        const submitButton =
            document.getElementById('submitButton');


        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);
        }


        function updateSummary() {

            summaryPlayerId.textContent =
                playerIdInput.value.trim() || '-';


            const selectedNominal =
                document.querySelector(
                    'input[name="nominal"]:checked'
                );

            if (selectedNominal) {

                summaryNominal.textContent =
                    selectedNominal.dataset.label;

                summaryPrice.textContent =
                    formatRupiah(
                        Number(selectedNominal.dataset.price)
                    );

            } else {

                summaryNominal.textContent = '-';
                summaryPrice.textContent = 'Rp0';

            }


            const selectedPayment =
                document.querySelector(
                    'input[name="payment"]:checked'
                );

            summaryPayment.textContent =
                selectedPayment
                    ? selectedPayment.value
                    : '-';
        }


        playerIdInput.addEventListener(
            'input',
            updateSummary
        );


        document
            .querySelectorAll('input[name="nominal"]')
            .forEach(input => {

                input.addEventListener(
                    'change',
                    updateSummary
                );

            });


        document
            .querySelectorAll('input[name="payment"]')
            .forEach(input => {

                input.addEventListener(
                    'change',
                    updateSummary
                );

            });


        submitButton.addEventListener(
            'click',
            function () {

                let valid = true;


                // Player ID
                if (!playerIdInput.value.trim()) {

                    document
                        .getElementById('playerIdError')
                        .classList.add('show');

                    valid = false;

                } else {

                    document
                        .getElementById('playerIdError')
                        .classList.remove('show');

                }


                // Nominal
                const selectedNominal =
                    document.querySelector(
                        'input[name="nominal"]:checked'
                    );

                if (!selectedNominal) {

                    document
                        .getElementById('nominalError')
                        .classList.add('show');

                    valid = false;

                } else {

                    document
                        .getElementById('nominalError')
                        .classList.remove('show');

                }


                // Payment
                const selectedPayment =
                    document.querySelector(
                        'input[name="payment"]:checked'
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


                if (!valid) {
                    return;
                }


                const playerId =
                    playerIdInput.value.trim();

                const diamond =
                    selectedNominal.dataset.label;

                const price =
                    selectedNominal.dataset.price;

                const payment =
                    selectedPayment.value;


                alert(
                    'Pesanan Free Fire berhasil dibuat!\\n\\n' +
                    'Player ID: ' + playerId + '\\n' +
                    'Nominal: ' + diamond + '\\n' +
                    'Pembayaran: ' + payment + '\\n' +
                    'Total: ' + formatRupiah(Number(price))
                );

            }
        );


        updateSummary();
    </script>

</body>

</html>