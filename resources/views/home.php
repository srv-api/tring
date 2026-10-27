@extends('layouts.app')

@section('title', 'Tring - Top Up Game ')

@section('topup-active', 'active')

@push('styles')

<style>

.topup-page {
    width: 100%;
}

.topup-content {
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    padding: 55px 24px 70px;
}

.breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 10px;
    color: var(--gray-3);
    margin-bottom: 25px;
}

.breadcrumb i {
    font-size: 8px;
}

.breadcrumb .current {
    color: var(--primary);
    font-weight: 700;
}

.topup-intro {
    margin-bottom: 25px;
}

.topup-intro-label {
    display: inline-block;
    color: var(--primary);
    font-size: 8px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 8px;
}

.topup-intro h2 {
    font-size: 27px;
    line-height: 1.15;
    letter-spacing: -1px;
    font-weight: 850;
    margin-bottom: 8px;
}

.topup-intro p {
    max-width: 560px;
    color: var(--gray-3);
    font-size: 11px;
    line-height: 1.7;
}

.search-box {
    position: relative;
    margin-bottom: 30px;
}

.search-box i {
    position: absolute;
    left: 17px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-3);
    font-size: 14px;
}

.search-box input {
    width: 100%;
    height: 51px;
    padding: 0 18px 0 45px;
    border: 1px solid var(--border);
    border-radius: 11px;
    outline: none;
    background: var(--white);
    color: var(--black);
    font-size: 11px;
    transition: .2s;
}

.search-box input::placeholder {
    color: var(--gray-3);
}

.search-box input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(127,0,121,.07);
}

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

.game-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}

.game-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;
}

.game-card:hover {
    transform: translateY(-4px);
    border-color: rgba(127,0,121,.25);
    box-shadow: 0 14px 35px rgba(0,0,0,.07);
}

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

.game-cover-overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    background: linear-gradient(
        to top,
        rgba(0,0,0,.32),
        transparent
    );
    pointer-events: none;
}

.game-content {
    padding: 17px;
}

.game-category {
    display: inline-block;
    padding: 5px 8px;
    margin-bottom: 9px;
    border-radius: 6px;
    background: var(--primary-light);
    color: var(--primary);
    font-size: 8px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.game-name {
    font-size: 15px;
    font-weight: 800;
    letter-spacing: -.3px;
    margin-bottom: 6px;
}

.game-description {
    min-height: 32px;
    margin-bottom: 16px;
    color: var(--gray-3);
    font-size: 10px;
    line-height: 1.6;
}

.topup-button {
    width: 100%;
    height: 39px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    border-radius: 8px;
    background: var(--primary);
    color: var(--white);
    text-decoration: none;
    font-size: 10px;
    font-weight: 700;
    transition: .2s;
}

.topup-button:hover {
    background: var(--primary-dark);
    color: var(--white);
}

.topup-button i {
    font-size: 11px;
}

.benefits {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-top: 38px;
}

.benefit {
    display: flex;
    gap: 13px;
    padding: 18px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 13px;
}

.benefit-icon {
    width: 38px;
    height: 38px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: var(--primary-light);
    color: var(--primary);
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

.no-result {
    display: none;
    grid-column: 1 / -1;
    padding: 55px 20px;
    text-align: center;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 16px;
}

.no-result i {
    display: block;
    margin-bottom: 12px;
    color: var(--gray-3);
    font-size: 30px;
}

.no-result h3 {
    font-size: 14px;
    margin-bottom: 5px;
}

.no-result p {
    color: var(--gray-3);
    font-size: 10px;
}

@media (max-width: 1000px) {

    .game-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media (max-width: 760px) {

    .topup-content {
        padding: 40px 16px 50px;
    }

    .topup-intro h2 {
        font-size: 23px;
    }

    .topup-intro p {
        font-size: 10px;
    }

    .game-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .benefits {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 480px) {

    .game-grid {
        grid-template-columns: 1fr;
    }

    .game-cover {
        height: 180px;
    }

}

</style>

@endpush

@section('content')

<div class="topup-page">


{{-- =====================================================
     HERO DOWNLOAD APP
     FILE TERPISAH
====================================================== --}}

@include('partials.hero')


{{-- =====================================================
     TOP UP CONTENT
====================================================== --}}

<section
    class="topup-content"
    id="games"
>

    {{-- BREADCRUMB --}}

    <div class="breadcrumb">

        <span>
            Home
        </span>

        <i class="bi bi-chevron-right"></i>

        <span class="current">
            Top Up Game
        </span>

    </div>


    {{-- INTRO --}}

    <div class="topup-intro">

        <span class="topup-intro-label">
            Tring Gaming
        </span>

        <h2>
            Pilih Game Favoritmu
        </h2>

        <p>
            Pilih game yang ingin kamu top up.
            Proses pengisian dibuat sederhana,
            praktis, dan mudah digunakan.
        </p>

    </div>


    {{-- SEARCH --}}

    <div class="search-box">

        <i class="bi bi-search"></i>

        <input
            type="text"
            id="gameSearch"
            placeholder="Cari nama game..."
            autocomplete="off"
        >

    </div>


    {{-- SECTION HEADER --}}

    <div class="section-header">

        <h2 class="section-title">
            Semua Game
        </h2>

        <span
            class="section-count"
            id="gameCount"
        >
            {{ count($games) }} game
        </span>

    </div>


    {{-- GAME GRID --}}

    <div
        class="game-grid"
        id="gameGrid"
    >

        @foreach ($games as $game)

            <article
                class="game-card"
                data-name="{{ strtolower($game['name']) }}"
                data-category="{{ strtolower($game['category']) }}"
            >

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

                    @elseif ($game['id'] === 'free-fire')

                        <img
                            src="{{ asset('games/ff.webp') }}"
                            alt="Free Fire"
                            class="game-cover-image"
                        >

                    @elseif ($game['id'] === 'pubg-mobile')

                        <img
                            src="{{ asset('games/pubg.webp') }}"
                            alt="PUBG Mobile"
                            class="game-cover-image"
                        >

                    @elseif ($game['id'] === 'honor-of-kings')

                        <img
                            src="{{ asset('games/hok.webp') }}"
                            alt="Honor of Kings"
                            class="game-cover-image"
                        >

                    @elseif ($game['id'] === 'genshin-impact')

                        <img
                            src="{{ asset('games/genshin.webp') }}"
                            alt="Genshin Impact"
                            class="game-cover-image"
                        >

                    @elseif ($game['id'] === 'valorant')

                        <img
                            src="{{ asset('games/valorant.webp') }}"
                            alt="Valorant"
                            class="game-cover-image"
                        >

                    @endif

                    <div class="game-cover-overlay"></div>

                </div>


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


        {{-- NO RESULT --}}

        <div
            class="no-result"
            id="noResult"
        >

            <i class="bi bi-controller"></i>

            <h3>
                Game tidak ditemukan
            </h3>

            <p>
                Coba gunakan kata kunci lain.
            </p>

        </div>

    </div>


    {{-- BENEFITS --}}

    <div class="benefits">

        <div class="benefit">

            <div class="benefit-icon">
                <i class="bi bi-lightning-charge"></i>
            </div>

            <div>

                <h3>
                    Proses Praktis
                </h3>

                <p>
                    Top up dibuat sederhana
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
                    Data transaksi diproses
                    melalui sistem Tring
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
                    Dapatkan bantuan ketika
                    mengalami kendala.
                </p>

            </div>

        </div>

    </div>

</section>


</div>

@endsection

@push('scripts')

<script>

const searchInput =
    document.getElementById('gameSearch');

const cards =
    document.querySelectorAll('.game-card');

const noResult =
    document.getElementById('noResult');

const gameCount =
    document.getElementById('gameCount');


if (searchInput) {

    searchInput.addEventListener(
        'input',
        function () {

            const keyword =
                this.value
                    .toLowerCase()
                    .trim();

            let visibleCount = 0;

            cards.forEach(card => {

                const name =
                    card.dataset.name || '';

                const category =
                    card.dataset.category || '';

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

        }
    );

}


/*
|--------------------------------------------------------------------------
| SMOOTH SCROLL
|--------------------------------------------------------------------------
*/

document.querySelectorAll(
    'a[href="#games"]'
).forEach(link => {

    link.addEventListener(
        'click',
        function (event) {

            event.preventDefault();

            const target =
                document.getElementById('games');

            if (target) {

                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

            }

        }
    );

});

</script>

@endpush
