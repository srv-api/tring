<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Top Up {{ $game['name'] }} - Tring.id
    </title>

    <link
        rel="icon"
        type="image/x-icon"
        href="{{ asset('tring.png') }}"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        :root {
            --primary: #7F0079;
            --primary-dark: #650061;
            --primary-light: #F8EAF7;

            --white: #FFFFFF;
            --black: #171717;

            --gray: #737373;
            --light-gray: #A3A3A3;

            --border: #E5E5E5;

            --background: #FAFAFA;

            --success: #16A34A;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--black);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            height: 72px;
            background: var(--primary);
            color: var(--white);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            max-width: 1240px;
            height: 100%;
            margin: auto;
            padding: 0 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;

            color: var(--white);

            font-size: 22px;
            font-weight: 800;

            white-space: nowrap;
        }

        .logo-box {
            width: 36px;
            height: 36px;

            border-radius: 10px;

            background: var(--white);
            color: var(--primary);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;
            font-weight: 800;
        }

        .navigation {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .navigation a {
            color: rgba(255,255,255,.72);

            font-size: 13px;
            font-weight: 600;

            transition: .2s;
        }

        .navigation a:hover,
        .navigation a.active {
            color: var(--white);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile {
            width: 35px;
            height: 35px;

            border-radius: 50%;

            border: 1px solid rgba(255,255,255,.3);

            background: rgba(255,255,255,.12);

            color: var(--white);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 15px;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            max-width: 1000px;
            margin: auto;
            padding: 38px 24px 60px;
        }

        /* =========================
           BACK
        ========================= */

        .back {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            color: var(--gray);

            font-size: 11px;
            font-weight: 600;

            margin-bottom: 25px;

            transition: .2s;
        }

        .back:hover {
            color: var(--primary);
        }

        /* =========================
           LAYOUT
        ========================= */

        .layout {
            display: grid;
            grid-template-columns: 330px 1fr;
            gap: 20px;
            align-items: start;
        }

        /* =========================
           GAME INFORMATION
        ========================= */

        .game-info {
            background: var(--white);

            border: 1px solid var(--border);

            border-radius: 16px;

            overflow: hidden;
        }

        .game-cover {
            height: 190px;

            position: relative;

            overflow: hidden;

            background: {{ $game['color'] }};
        }

        .game-cover-image {
            position: absolute;
            inset: 0;

            width: 100%;
            height: 100%;

            object-fit: cover;

            display: block;

            z-index: 1;

            transition: transform .35s ease;
        }

        .game-cover:hover .game-cover-image {
            transform: scale(1.04);
        }

        .game-cover-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    to top,
                    rgba(0,0,0,.35),
                    rgba(0,0,0,0)
                );

            z-index: 2;

            pointer-events: none;
        }

        /* =========================
           GAME DETAILS
        ========================= */

        .game-details {
            padding: 22px;
        }

        .category {
            display: inline-block;

            padding: 5px 8px;

            border-radius: 6px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 8px;
            font-weight: 800;

            text-transform: uppercase;

            margin-bottom: 10px;
        }

        .game-details h1 {
            font-size: 20px;
            font-weight: 800;

            margin-bottom: 8px;

            line-height: 1.3;
        }

        .game-details p {
            color: var(--light-gray);

            font-size: 10px;
            line-height: 1.6;
        }

        .secure {
            margin-top: 20px;
            padding-top: 18px;

            border-top: 1px solid var(--border);

            display: flex;
            align-items: center;
            gap: 9px;

            color: var(--success);

            font-size: 10px;
            font-weight: 600;
        }

        /* =========================
           FORM
        ========================= */

        .form-card {
            background: var(--white);

            border: 1px solid var(--border);

            border-radius: 16px;

            padding: 25px;
        }

        .form-title {
            font-size: 18px;
            font-weight: 800;

            margin-bottom: 5px;
        }

        .form-subtitle {
            color: var(--gray);

            font-size: 10px;
            line-height: 1.5;

            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;

            font-size: 11px;
            font-weight: 700;

            margin-bottom: 9px;
        }

        .input {
            width: 100%;
            height: 45px;

            border: 1px solid var(--border);

            border-radius: 9px;

            padding: 0 13px;

            outline: none;

            font-size: 11px;

            color: var(--black);

            background: var(--white);

            transition: .2s;
        }

        .input:focus {
            border-color: var(--primary);

            box-shadow:
                0 0 0 3px
                rgba(127,0,121,.07);
        }

        .input::placeholder {
            color: #B0B0B0;
        }

        .input-help {
            margin-top: 7px;

            color: #A3A3A3;

            font-size: 9px;

            line-height: 1.5;
        }

        /* =========================
           NOMINAL
        ========================= */

        .nominal-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 9px;
        }

        .nominal {
            position: relative;
        }

        .nominal input {
            position: absolute;

            opacity: 0;

            pointer-events: none;
        }

        .nominal label {
            display: block;

            padding: 13px 8px;

            border: 1px solid var(--border);

            border-radius: 9px;

            text-align: center;

            cursor: pointer;

            font-size: 10px;
            font-weight: 700;

            transition: .2s;

            background: var(--white);
        }

        .nominal label:hover {
            border-color:
                rgba(127,0,121,.4);
        }

        .nominal input:checked + label {
            background: var(--primary-light);

            border-color: var(--primary);

            color: var(--primary);
        }

        /* =========================
           PAYMENT
        ========================= */

        .payment-list {
            display: grid;
            gap: 9px;
        }

        .payment {
            position: relative;
        }

        .payment input {
            position: absolute;

            opacity: 0;

            pointer-events: none;
        }

        .payment label {
            display: flex;

            align-items: center;

            justify-content: space-between;

            border: 1px solid var(--border);

            border-radius: 9px;

            padding: 13px;

            cursor: pointer;

            transition: .2s;

            background: var(--white);
        }

        .payment label:hover {
            border-color:
                rgba(127,0,121,.4);
        }

        .payment-left {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .payment-icon {
            width: 30px;
            height: 30px;

            flex-shrink: 0;

            border-radius: 7px;

            background: var(--primary-light);

            color: var(--primary);

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 14px;
        }

        .payment-name {
            font-size: 10px;
            font-weight: 700;
        }

        .payment-desc {
            margin-top: 3px;

            color: #A3A3A3;

            font-size: 8px;
        }

        .payment input:checked + label {
            border-color: var(--primary);

            background: #FCF5FB;
        }

        /* =========================
           SUMMARY
        ========================= */

        .summary {
            border-top: 1px solid var(--border);

            margin-top: 24px;

            padding-top: 18px;
        }

        .summary-row {
            display: flex;

            justify-content: space-between;

            align-items: center;

            font-size: 10px;

            margin-bottom: 9px;
        }

        .summary-row span:first-child {
            color: var(--gray);
        }

        .summary-total {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: 13px;

            padding-top: 13px;

            border-top: 1px dashed var(--border);
        }

        .summary-total span:first-child {
            font-size: 11px;
            font-weight: 800;
        }

        .total-price {
            color: var(--primary);

            font-size: 18px;
            font-weight: 800;
        }

        /* =========================
           BUTTON
        ========================= */

        .buy-button {
            width: 100%;
            height: 46px;

            margin-top: 20px;

            border: none;

            border-radius: 9px;

            background: var(--primary);

            color: var(--white);

            font-size: 11px;
            font-weight: 700;

            display: flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            transition: .2s;
        }

        .buy-button:hover {
            background: var(--primary-dark);

            transform: translateY(-1px);
        }

        .buy-button:disabled {
            opacity: .6;

            cursor: not-allowed;

            transform: none;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .navigation {
                display: none;
            }

            .layout {
                grid-template-columns: 1fr;
            }

            .game-info {
                display: grid;

                grid-template-columns: 180px 1fr;
            }

            .game-cover {
                height: 100%;

                min-height: 190px;
            }

        }

        @media (max-width: 600px) {

            .header {
                height: 65px;
            }

            .header-container {
                padding: 0 16px;
            }

            .logo {
                font-size: 19px;
            }

            .logo-box {
                width: 32px;
                height: 32px;

                border-radius: 9px;
            }

            .main {
                padding:
                    25px
                    16px
                    45px;
            }

            .back {
                margin-bottom: 20px;
            }

            .game-info {
                display: block;
            }

            .game-cover {
                height: 170px;

                min-height: 0;
            }

            .game-details {
                padding: 18px;
            }

            .form-card {
                padding: 18px;
            }

            .nominal-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }

        @media (max-width: 360px) {

            .main {
                padding-left: 12px;
                padding-right: 12px;
            }

            .form-card {
                padding: 15px;
            }

            .nominal label {
                padding:
                    12px
                    5px;

                font-size: 9px;
            }

            .payment label {
                padding: 11px;
            }

        }

    </style>

</head>

<body>

<header class="header">

    <div class="header-container">

        {{-- LOGO --}}

        <a
            href="{{ route('home') }}"
            class="logo"
        >

            <div class="logo-box">
                T
            </div>

            Tring.id

        </a>


        {{-- NAVIGATION --}}

        <nav class="navigation">

            <a href="{{ route('home') }}">
                Home
            </a>

            <a
                href="{{ route('topup.show', 'free-fire') }}"
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


        {{-- PROFILE --}}

        <div class="header-right">

            <div class="profile">
                <i class="bi bi-person"></i>
            </div>

        </div>

    </div>

</header>


<main class="main">


    {{-- BACK --}}

    <a
        href="{{ route('home') }}"
        class="back"
    >

        <i class="bi bi-arrow-left"></i>

        Kembali ke Home

    </a>


    <div class="layout">


        {{-- ==================================================
             GAME INFORMATION
        ================================================== --}}

        <section class="game-info">


            {{-- GAME COVER --}}

            <div class="game-cover">

                <img
                    src="{{ asset('images/games/ff.webp') }}"
                    alt="{{ $game['name'] }}"
                    class="game-cover-image"
                >

                <div class="game-cover-overlay"></div>

            </div>


            {{-- GAME DETAILS --}}

            <div class="game-details">

                <span class="category">
                    {{ $game['category'] }}
                </span>

                <h1>
                    {{ $game['name'] }}
                </h1>

                <p>
                    {{ $game['description'] }}
                </p>

                <div class="secure">

                    <i class="bi bi-shield-check"></i>

                    Transaksi aman dan praktis

                </div>

            </div>

        </section>


        {{-- ==================================================
             FORM
        ================================================== --}}

        <section class="form-card">

            <h2 class="form-title">
                Top Up {{ $game['name'] }}
            </h2>

            <p class="form-subtitle">
                Masukkan User ID, pilih nominal, kemudian lanjutkan pembayaran.
            </p>


            {{-- USER ID --}}

            <div class="form-group">

                <label
                    for="userId"
                    class="form-label"
                >
                    User ID
                </label>

                <input
                    type="text"
                    id="userId"
                    class="input"
                    placeholder="Masukkan User ID"
                    autocomplete="off"
                >

                <div class="input-help">
                    Pastikan User ID yang dimasukkan sudah benar.
                </div>

            </div>


            {{-- NOMINAL --}}

            <div class="form-group">

                <label class="form-label">
                    Pilih Nominal
                </label>

                <div class="nominal-grid">

                    @if (!empty($products))

                        @foreach ($products as $index => $product)

                            <div class="nominal">

                                <input
                                    type="radio"
                                    name="nominal"
                                    id="nominal{{ $index }}"
                                    value="{{ $product['code'] }}"
                                    data-price="{{ $product['price'] }}"
                                    data-name="{{ $product['name'] }}"
                                    @checked($index === 0)
                                >

                                <label for="nominal{{ $index }}">

                                    {{ number_format($product['price'], 0, ',', '.') }}

                                </label>

                            </div>

                        @endforeach

                    @else

                        <p style="
                            grid-column:1/-1;
                            color:#737373;
                            font-size:10px;
                        ">
                            Produk top up belum tersedia.
                        </p>

                    @endif

                </div>

            </div>


            {{-- PAYMENT --}}

            <div class="form-group">

                <label class="form-label">
                    Metode Pembayaran
                </label>

                <div class="payment-list">

                    <div class="payment">

                        <input
                            type="radio"
                            name="payment"
                            id="qris"
                            value="qris"
                            checked
                        >

                        <label for="qris">

                            <div class="payment-left">

                                <div class="payment-icon">
                                    <i class="bi bi-qr-code"></i>
                                </div>

                                <div>

                                    <div class="payment-name">
                                        QRIS
                                    </div>

                                    <div class="payment-desc">
                                        Scan menggunakan aplikasi pembayaran
                                    </div>

                                </div>

                            </div>

                            <i class="bi bi-chevron-right"></i>

                        </label>

                    </div>

                </div>

            </div>


            {{-- SUMMARY --}}

            <div class="summary">

                <div class="summary-row">

                    <span>
                        Produk
                    </span>

                    <span id="productName">
                        -
                    </span>

                </div>


                <div class="summary-row">

                    <span>
                        Harga
                    </span>

                    <span id="price">
                        Rp0
                    </span>

                </div>


                <div class="summary-row">

                    <span>
                        Biaya layanan
                    </span>

                    <span>
                        Rp0
                    </span>

                </div>


                <div class="summary-total">

                    <span>
                        Total Pembayaran
                    </span>

                    <span
                        class="total-price"
                        id="totalPrice"
                    >
                        Rp0
                    </span>

                </div>

            </div>


            {{-- BUTTON --}}

            <button
                type="button"
                class="buy-button"
                id="buyButton"
                onclick="processTopUp()"
            >

                Lanjutkan Pembayaran

                <i class="bi bi-arrow-right"></i>

            </button>

        </section>

    </div>

</main>


<script>

    const nominalInputs =
        document.querySelectorAll(
            'input[name="nominal"]'
        );

    const price =
        document.getElementById('price');

    const totalPrice =
        document.getElementById('totalPrice');

    const productName =
        document.getElementById('productName');


    function formatRupiah(value) {

        return new Intl.NumberFormat(
            'id-ID',
            {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }
        ).format(value);

    }


    function updatePrice() {

        const selected =
            document.querySelector(
                'input[name="nominal"]:checked'
            );

        if (!selected) {
            return;
        }

        const amount =
            Number(selected.dataset.price);

        price.textContent =
            formatRupiah(amount);

        totalPrice.textContent =
            formatRupiah(amount);

        productName.textContent =
            selected.dataset.name;

    }


    nominalInputs.forEach(input => {

        input.addEventListener(
            'change',
            updatePrice
        );

    });


    updatePrice();


    function processTopUp() {

        const userIdElement =
            document.getElementById('userId');

        const userId =
            userIdElement.value.trim();


        if (!userId) {

            alert(
                'Silakan masukkan User ID terlebih dahulu.'
            );

            userIdElement.focus();

            return;
        }


        const selected =
            document.querySelector(
                'input[name="nominal"]:checked'
            );


        if (!selected) {

            alert(
                'Silakan pilih nominal top up.'
            );

            return;
        }


        const payment =
            document.querySelector(
                'input[name="payment"]:checked'
            );


        if (!payment) {

            alert(
                'Silakan pilih metode pembayaran.'
            );

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Buat form POST ke Laravel
        |--------------------------------------------------------------------------
        */

        const form =
            document.createElement('form');

        form.method = 'POST';

        form.action =
            "{{ route('topup.order') }}";


        /*
        |--------------------------------------------------------------------------
        | CSRF
        |--------------------------------------------------------------------------
        */

        const csrf =
            document.createElement('input');

        csrf.type = 'hidden';

        csrf.name = '_token';

        csrf.value =
            "{{ csrf_token() }}";

        form.appendChild(csrf);


        /*
        |--------------------------------------------------------------------------
        | GAME
        |--------------------------------------------------------------------------
        */

        const game =
            document.createElement('input');

        game.type = 'hidden';

        game.name = 'game';

        game.value =
            "{{ $gameSlug }}";

        form.appendChild(game);


        /*
        |--------------------------------------------------------------------------
        | USER ID
        |--------------------------------------------------------------------------
        */

        const user =
            document.createElement('input');

        user.type = 'hidden';

        user.name = 'user_id';

        user.value =
            userId;

        form.appendChild(user);


        /*
        |--------------------------------------------------------------------------
        | SERVER ID
        |--------------------------------------------------------------------------
        */

        const server =
            document.createElement('input');

        server.type = 'hidden';

        server.name = 'server_id';

        server.value = '';

        form.appendChild(server);


        /*
        |--------------------------------------------------------------------------
        | SKU
        |--------------------------------------------------------------------------
        */

        const sku =
            document.createElement('input');

        sku.type = 'hidden';

        sku.name = 'sku';

        sku.value =
            selected.value;

        form.appendChild(sku);


        /*
        |--------------------------------------------------------------------------
        | PRODUCT NAME
        |--------------------------------------------------------------------------
        */

        const product =
            document.createElement('input');

        product.type = 'hidden';

        product.name = 'product_name';

        product.value =
            selected.dataset.name;

        form.appendChild(product);


        /*
        |--------------------------------------------------------------------------
        | PRICE
        |--------------------------------------------------------------------------
        */

        const amount =
            document.createElement('input');

        amount.type = 'hidden';

        amount.name = 'price';

        amount.value =
            selected.dataset.price;

        form.appendChild(amount);


        /*
        |--------------------------------------------------------------------------
        | PAYMENT METHOD
        |--------------------------------------------------------------------------
        */

        const paymentMethod =
            document.createElement('input');

        paymentMethod.type = 'hidden';

        paymentMethod.name =
            'payment_method';

        paymentMethod.value =
            payment.value;

        form.appendChild(paymentMethod);


        /*
        |--------------------------------------------------------------------------
        | Disable button
        |--------------------------------------------------------------------------
        */

        const button =
            document.getElementById(
                'buyButton'
            );

        button.disabled = true;

        button.innerHTML =
            '<i class="bi bi-hourglass-split"></i> Memproses...';


        document.body.appendChild(form);

        form.submit();

    }

</script>

</body>

</html>