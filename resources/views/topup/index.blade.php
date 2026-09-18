<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Top Up Game - Tring.id</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('tring.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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
            --gray-1: #525252;
            --gray-2: #737373;
            --gray-3: #A3A3A3;
            --border: #E5E5E5;
            --background: #FAFAFA;

            --radius: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--black);
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
            background: #7F0079;
            color: #FFFFFF;

            position: sticky;
            top: 0;
            z-index: 100;

            box-shadow: 0 3px 15px rgba(127, 0, 121, .12);
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

            font-size: 22px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .logo-box {
            width: 36px;
            height: 36px;

            background: #FFFFFF;
            color: #7F0079;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 800;
            font-size: 18px;
        }

        .navigation {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .navigation a {
            color: rgba(255, 255, 255, .72);

            font-size: 13px;
            font-weight: 600;

            transition: .2s;
        }

        .navigation a:hover,
        .navigation a.active {
            color: #FFFFFF;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .history-button {
            display: flex;
            align-items: center;
            gap: 7px;

            background: transparent;
            color: #FFFFFF;

            border: 1px solid rgba(255, 255, 255, .3);

            padding: 9px 13px;
            border-radius: 9px;

            font-size: 11px;
            font-weight: 600;
        }

        .history-button:hover {
            background: rgba(255, 255, 255, .08);
        }

        .profile {
            width: 35px;
            height: 35px;

            border-radius: 50%;

            background: rgba(255, 255, 255, .14);
            color: #FFFFFF;

            border: 1px solid rgba(255, 255, 255, .25);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile:hover {
            background: rgba(255, 255, 255, .22);
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            max-width: 1240px;
            margin: auto;
            padding: 38px 24px 60px;
        }

        /* =========================
           BREADCRUMB
        ========================= */

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;

            font-size: 11px;
            color: var(--gray-3);

            margin-bottom: 25px;
        }

        .breadcrumb i {
            font-size: 9px;
        }

        .breadcrumb .current {
            color: var(--primary);
            font-weight: 600;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            background: #7F0079;
            border-radius: 20px;

            padding: 34px 38px;

            color: #FFFFFF;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;

            overflow: hidden;
            position: relative;

            margin-bottom: 32px;
        }

        .hero::before {
            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            border-radius: 50%;

            background: rgba(255, 255, 255, .05);

            right: -70px;
            top: -150px;
        }

        .hero::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background: rgba(255, 255, 255, .05);

            right: 170px;
            bottom: -130px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-label {
            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.5px;
            text-transform: uppercase;

            opacity: .7;

            margin-bottom: 9px;
        }

        .hero h1 {
            font-size: 29px;
            line-height: 1.2;

            letter-spacing: -1px;

            margin-bottom: 10px;
        }

        .hero p {
            max-width: 550px;

            font-size: 12px;
            line-height: 1.7;

            color: rgba(255, 255, 255, .78);
        }

        .hero-icon {
            position: relative;
            z-index: 2;

            width: 105px;
            height: 105px;

            border-radius: 25px;

            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .15);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 48px;

            flex-shrink: 0;
        }

        /* =========================
           SEARCH
        ========================= */

        .search-box {
            position: relative;
            margin-bottom: 30px;
        }

        .search-box i {
            position: absolute;

            left: 17px;
            top: 50%;

            transform: translateY(-50%);

            color: #A3A3A3;

            font-size: 15px;
        }

        .search-box input {
            width: 100%;

            height: 50px;

            background: #FFFFFF;

            border: 1px solid var(--border);
            border-radius: 11px;

            outline: none;

            padding: 0 18px 0 45px;

            color: var(--black);
            font-size: 12px;

            transition: .2s;
        }

        .search-box input::placeholder {
            color: #A3A3A3;
        }

        .search-box input:focus {
            border-color: var(--primary);

            box-shadow: 0 0 0 3px rgba(127, 0, 121, .07);
        }

        /* =========================
           SECTION
        ========================= */

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 17px;
        }

        .section-title {
            font-size: 17px;
            font-weight: 800;

            letter-spacing: -.4px;
        }

        .section-count {
            font-size: 10px;
            color: var(--gray-3);
        }

        /* =========================
           GAME GRID
        ========================= */

        .game-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 18px;
        }

        .game-card {
            background: #FFFFFF;

            border: 1px solid var(--border);

            border-radius: var(--radius);

            overflow: hidden;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                border-color .2s ease;
        }

        .game-card:hover {
            transform: translateY(-3px);

            border-color: rgba(127, 0, 121, .25);

            box-shadow: 0 12px 30px rgba(0, 0, 0, .06);
        }

        /* =========================
           GAME COVER
        ========================= */

        .game-cover {
            height: 180px;

            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
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

        .game-card:hover .game-cover-image {
            transform: scale(1.04);
        }

        /* =========================
           IMAGE OVERLAY
        ========================= */

        .game-cover-overlay {
            position: absolute;

            inset: 0;

            background: linear-gradient(
                to top,
                rgba(0, 0, 0, .30),
                rgba(0, 0, 0, 0)
            );

            z-index: 2;

            pointer-events: none;
        }

        /* =========================
           GAME CONTENT
        ========================= */

        .game-content {
            padding: 17px;
        }

        .game-category {
            display: inline-block;

            color: var(--primary);
            background: var(--primary-light);

            padding: 5px 8px;

            border-radius: 6px;

            font-size: 8px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: .5px;

            margin-bottom: 9px;
        }

        .game-name {
            font-size: 15px;
            font-weight: 800;

            margin-bottom: 6px;

            letter-spacing: -.3px;
        }

        .game-description {
            font-size: 10px;

            color: var(--gray-3);

            line-height: 1.6;

            min-height: 32px;

            margin-bottom: 16px;
        }

        /* =========================
           TOP UP BUTTON
        ========================= */

        .topup-button {
            width: 100%;

            height: 39px;

            border: none;

            border-radius: 8px;

            background: var(--primary);
            color: #FFFFFF;

            font-size: 10px;
            font-weight: 700;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            transition: .2s;
        }

        .topup-button:hover {
            background: var(--primary-dark);
        }

        .topup-button i {
            font-size: 11px;
        }

        /* =========================
           BENEFITS
        ========================= */

        .benefits {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 16px;

            margin-top: 38px;
        }

        .benefit {
            background: #FFFFFF;

            border: 1px solid var(--border);

            border-radius: 13px;

            padding: 18px;

            display: flex;
            gap: 13px;
        }

        .benefit-icon {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            border-radius: 10px;

            background: var(--primary-light);
            color: var(--primary);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .benefit h3 {
            font-size: 11px;
            font-weight: 800;

            margin-bottom: 5px;
        }

        .benefit p {
            color: var(--gray-3);

            font-size: 9px;

            line-height: 1.6;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #FFFFFF;

            border-top: 1px solid var(--border);

            padding: 25px 24px;
        }

        .footer-container {
            max-width: 1240px;
            margin: auto;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .footer-logo {
            color: var(--primary);

            font-size: 15px;
            font-weight: 800;
        }

        .footer-copy {
            margin-top: 5px;

            color: var(--gray-3);

            font-size: 9px;
        }

        .footer-links {
            display: flex;
            gap: 20px;
        }

        .footer-links a {
            color: var(--gray-2);
            font-size: 9px;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        /* =========================
           NO RESULT
        ========================= */

        .no-result {
            display: none;

            grid-column: 1 / -1;

            text-align: center;

            background: #FFFFFF;

            border: 1px solid var(--border);

            border-radius: 16px;

            padding: 45px 20px;
        }

        .no-result i {
            font-size: 30px;
            color: var(--gray-3);

            display: block;

            margin-bottom: 12px;
        }

        .no-result h3 {
            font-size: 14px;

            margin-bottom: 5px;
        }

        .no-result p {
            color: var(--gray-3);

            font-size: 10px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .navigation {
                display: none;
            }

            .game-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .benefits {
                grid-template-columns: 1fr;
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
            }

            .history-button span {
                display: none;
            }

            .history-button {
                width: 35px;
                height: 35px;

                padding: 0;

                justify-content: center;
            }

            .profile {
                width: 35px;
                height: 35px;
            }

            .main {
                padding: 25px 16px 45px;
            }

            .hero {
                padding: 25px 22px;

                border-radius: 16px;

                min-height: 190px;
            }

            .hero h1 {
                font-size: 24px;
            }

            .hero p {
                font-size: 10px;
            }

            .hero-icon {
                width: 72px;
                height: 72px;

                font-size: 32px;

                border-radius: 18px;
            }

            .game-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .game-cover {
                height: 125px;
            }

            .game-content {
                padding: 12px;
            }

            .game-name {
                font-size: 12px;
            }

            .game-description {
                font-size: 9px;

                min-height: 29px;

                margin-bottom: 12px;
            }

            .topup-button {
                height: 35px;

                font-size: 9px;
            }

            .footer-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-links {
                flex-wrap: wrap;
                gap: 14px;
            }
        }

        @media (max-width: 360px) {

            .game-grid {
                grid-template-columns: 1fr;
            }

            .hero-icon {
                display: none;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
         HEADER
    ========================= --}}

    <header class="header">

        <div class="header-container">

            <a href="{{ url('/') }}" class="logo">

                <div class="logo-box">
                    T
                </div>

                Tring.id

            </a>

            <nav class="navigation">

                <a href="{{ url('/') }}">
                    Home
                </a>

                <a href="{{ route('topup.index') }}" class="active">
                    Top Up
                </a>

                <a href="#">
                    Riwayat
                </a>

                <a href="#">
                    Bantuan
                </a>

            </nav>

            <div class="header-right">

                <button class="history-button" type="button">

                    <i class="bi bi-clock-history"></i>

                    <span>Riwayat</span>

                </button>

                <button class="profile" type="button">

                    <i class="bi bi-person"></i>

                </button>

            </div>

        </div>

    </header>


    {{-- =========================
         MAIN
    ========================= --}}

    <main class="main">

        {{-- =========================
             BREADCRUMB
        ========================= --}}

        <div class="breadcrumb">

            <span>
                Home
            </span>

            <i class="bi bi-chevron-right"></i>

            <span class="current">
                Top Up Game
            </span>

        </div>


        {{-- =========================
             HERO
        ========================= --}}

        <section class="hero">

            <div class="hero-content">

                <div class="hero-label">
                    Tring.id Gaming
                </div>

                <h1>
                    Top Up Game Favoritmu
                </h1>

                <p>
                    Pilih game favoritmu dan isi ulang dengan mudah
                    melalui Tring.id. Cepat, praktis, dan mudah digunakan.
                </p>

            </div>

            <div class="hero-icon">

                <i class="bi bi-controller"></i>

            </div>

        </section>


        {{-- =========================
             SEARCH
        ========================= --}}

        <div class="search-box">

            <i class="bi bi-search"></i>

            <input
                type="text"
                id="gameSearch"
                placeholder="Cari nama game..."
                autocomplete="off"
            >

        </div>


        {{-- =========================
             GAME SECTION
        ========================= --}}

        <div class="section-header">

            <h2 class="section-title">
                Pilih Game
            </h2>

            <span class="section-count" id="gameCount">
                {{ count($games) }} game
            </span>

        </div>


        <div class="game-grid" id="gameGrid">

            @foreach ($games as $game)

                <article
                    class="game-card"
                    data-name="{{ strtolower($game['name']) }}"
                    data-category="{{ strtolower($game['category']) }}"
                >

                    {{-- =========================
                         GAME COVER
                    ========================= --}}

                    <div
                        class="game-cover"
                        style="background: {{ $game['color'] }};"
                    >

                        @if ($game['id'] === 'mobile-legends')

                            <img
                                src="{{ asset('games/ml.webp') }}"
                                alt="Mobile Legends"
                                class="game-cover-image"
                            >

                            <div class="game-cover-overlay"></div>


                        @elseif ($game['id'] === 'free-fire')

                            <img
                                src="{{ asset('games/ff.webp') }}"
                                alt="Free Fire"
                                class="game-cover-image"
                            >

                            <div class="game-cover-overlay"></div>


                        @elseif ($game['id'] === 'pubg-mobile')

                            <img
                                src="{{ asset('games/pubg.webp') }}"
                                alt="PUBG Mobile"
                                class="game-cover-image"
                            >

                            <div class="game-cover-overlay"></div>


                        @elseif ($game['id'] === 'honor-of-kings')

                            <img
                                src="{{ asset('games/hok.webp') }}"
                                alt="Honor of Kings"
                                class="game-cover-image"
                            >

                            <div class="game-cover-overlay"></div>


                        @elseif ($game['id'] === 'genshin-impact')

                            <img
                                src="{{ asset('games/genshin.webp') }}"
                                alt="Genshin Impact"
                                class="game-cover-image"
                            >

                            <div class="game-cover-overlay"></div>


                        @elseif ($game['id'] === 'valorant')

                            <img
                                src="{{ asset('games/valorant.webp') }}"
                                alt="Valorant"
                                class="game-cover-image"
                            >

                            <div class="game-cover-overlay"></div>

                        @endif

                    </div>


                    {{-- =========================
                         GAME CONTENT
                    ========================= --}}

                    <div class="game-content">

                        <span class="game-category">
                            {{ $game['category'] }}
                        </span>

                        <h3 class="game-name">
                            {{ $game['name'] }}
                        </h3>

                        <p class="game-description">
                            {{ $game['description'] }}
                        </p>

                        <a
                            href="{{ route('topup.show', $game['id']) }}"
                            class="topup-button"
                        >

                            Top Up Sekarang

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </article>

            @endforeach


            {{-- =========================
                 NO RESULT
            ========================= --}}

            <div class="no-result" id="noResult">

                <i class="bi bi-controller"></i>

                <h3>
                    Game tidak ditemukan
                </h3>

                <p>
                    Coba gunakan kata kunci lain.
                </p>

            </div>

        </div>


        {{-- =========================
             BENEFITS
        ========================= --}}

        <div class="benefits">

            <div class="benefit">

                <div class="benefit-icon">

                    <i class="bi bi-lightning-charge"></i>

                </div>

                <div>

                    <h3>
                        Proses Cepat
                    </h3>

                    <p>
                        Proses top up dibuat sederhana
                        dan mudah digunakan.
                    </p>

                </div>

            </div>


            <div class="benefit">

                <div class="benefit-icon">

                    <i class="bi bi-shield-check"></i>

                </div>

                <div>

                    <h3>
                        Aman
                    </h3>

                    <p>
                        Data transaksi diproses melalui
                        sistem Tring.id.
                    </p>

                </div>

            </div>


            <div class="benefit">

                <div class="benefit-icon">

                    <i class="bi bi-headset"></i>

                </div>

                <div>

                    <h3>
                        Bantuan
                    </h3>

                    <p>
                        Pengguna dapat memperoleh
                        bantuan ketika mengalami kendala.
                    </p>

                </div>

            </div>

        </div>

    </main>


    {{-- =========================
         FOOTER
    ========================= --}}

    <footer class="footer">

        <div class="footer-container">

            <div>

                <div class="footer-logo">
                    Tring.id
                </div>

                <div class="footer-copy">
                    © {{ date('Y') }} Tring.id. All rights reserved.
                </div>

            </div>

            <div class="footer-links">

                <a href="#">
                    Tentang Kami
                </a>

                <a href="#">
                    Kebijakan Privasi
                </a>

                <a href="#">
                    Syarat & Ketentuan
                </a>

            </div>

        </div>

    </footer>


    <script>

        /* =========================
           SEARCH GAME
        ========================= */

        const searchInput =
            document.getElementById('gameSearch');

        const cards =
            document.querySelectorAll('.game-card');

        const noResult =
            document.getElementById('noResult');

        const gameCount =
            document.getElementById('gameCount');


        searchInput.addEventListener('input', function () {

            const keyword =
                this.value
                    .toLowerCase()
                    .trim();

            let visibleCount = 0;


            cards.forEach(card => {

                const name =
                    card.dataset.name;

                const category =
                    card.dataset.category;


                const match =
                    name.includes(keyword) ||
                    category.includes(keyword);


                if (match) {

                    card.style.display = '';

                    visibleCount++;

                } else {

                    card.style.display = 'none';

                }

            });


            if (visibleCount === 0) {

                noResult.style.display = 'block';

            } else {

                noResult.style.display = 'none';

            }


            gameCount.textContent =
                visibleCount + ' game';

        });

    </script>

</body>

</html>