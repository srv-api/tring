<style>

/* =========================================================
   HERO
========================================================= */

.app-hero {
    position: relative;
    width: 100%;

    /* HANYA BACKGROUND HERO YANG DIPENDEKKAN */
    min-height: 580px;

    display: flex;
    align-items: center;

    padding: 30px 24px;

    overflow: hidden;

    background:
        radial-gradient(
            circle at 78% 45%,
            rgba(255, 255, 255, .13),
            transparent 28%
        ),
        radial-gradient(
            circle at 12% 85%,
            rgba(255, 255, 255, .07),
            transparent 30%
        ),
        var(--primary);

    color: #fff;
}


/* =========================================================
   DECORATIVE CIRCLES
========================================================= */

.app-hero::before {
    content: "";

    position: absolute;

    width: 650px;
    height: 650px;

    border-radius: 50%;

    border: 1px solid rgba(255, 255, 255, .08);

    right: -280px;
    top: -250px;

    pointer-events: none;
}

.app-hero::after {
    content: "";

    position: absolute;

    width: 470px;
    height: 470px;

    border-radius: 50%;

    border: 1px solid rgba(255, 255, 255, .07);

    right: 20px;
    bottom: -350px;

    pointer-events: none;
}


/* =========================================================
   MAIN GRID
========================================================= */

.hero-grid {
    position: relative;
    z-index: 2;

    width: 100%;
    max-width: 1200px;

    margin: 0 auto;

    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        460px;

    align-items: center;

    column-gap: 70px;
}


/* =========================================================
   LEFT CONTENT
========================================================= */

.app-hero-content {
    width: 100%;
    max-width: 620px;
}

.app-badge {
    display: inline-flex;
    align-items: center;

    gap: 8px;

    padding: 8px 13px;
    margin-bottom: 24px;

    border-radius: 999px;

    background: rgba(255, 255, 255, .10);
    border: 1px solid rgba(255, 255, 255, .14);

    font-size: 9px;
    font-weight: 800;

    letter-spacing: .7px;
    text-transform: uppercase;

    backdrop-filter: blur(10px);
}

.app-badge i {
    font-size: 12px;
}


/* =========================================================
   HEADING
========================================================= */

.app-hero h1 {
    max-width: 620px;

    margin: 0 0 22px;

    font-size: clamp(48px, 5vw, 72px);

    line-height: .98;

    letter-spacing: -4px;

    font-weight: 900;
}

.app-hero h1 span {
    display: block;

    color: rgba(255, 255, 255, .46);
}


/* =========================================================
   DESCRIPTION
========================================================= */

.app-hero-description {
    max-width: 520px;

    margin: 0 0 30px;

    font-size: 14px;

    line-height: 1.8;

    color: rgba(255, 255, 255, .68);
}


/* =========================================================
   BUTTONS
========================================================= */

.app-hero-actions {
    display: flex;
    align-items: center;

    gap: 12px;

    margin-bottom: 27px;

    flex-wrap: wrap;
}

.app-download-button {
    height: 50px;

    padding: 0 21px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 9px;

    border-radius: 11px;

    background: #fff;
    color: #111827;

    font-size: 11px;
    font-weight: 800;

    text-decoration: none;

    box-shadow: 0 14px 30px rgba(0, 0, 0, .16);

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}

.app-download-button:hover {
    color: #111827;

    transform: translateY(-2px);

    box-shadow: 0 18px 35px rgba(0, 0, 0, .22);
}

.app-download-button i {
    font-size: 18px;
}




/* =========================================================
   TRUST
========================================================= */

.hero-trust {
    display: flex;
    align-items: center;

    gap: 16px;
}

.trust-item {
    display: flex;
    align-items: center;

    gap: 7px;

    font-size: 9px;

    color: rgba(255, 255, 255, .50);

    white-space: nowrap;
}

.trust-item i {
    font-size: 12px;

    color: rgba(255, 255, 255, .75);
}

.trust-divider {
    width: 1px;
    height: 14px;

    flex: 0 0 1px;

    background: rgba(255, 255, 255, .16);
}


/* =========================================================
   RIGHT VISUAL
========================================================= */

.app-visual {
    position: relative;

    width: 100%;
    height: 540px;

    display: flex;
    align-items: center;
    justify-content: center;
}


/* =========================================================
   GLOW
========================================================= */

.visual-glow {
    position: absolute;

    width: 420px;
    height: 420px;

    border-radius: 50%;

    background: rgba(255, 255, 255, .09);

    filter: blur(2px);
}

.visual-circle {
    position: absolute;

    width: 365px;
    height: 365px;

    border-radius: 50%;

    border: 1px solid rgba(255, 255, 255, .10);
}


/* =========================================================
   PHONE
========================================================= */

.app-phone {
    position: relative;
    z-index: 4;

    width: 232px;
    height: 450px;

    padding: 8px;

    border-radius: 34px;

    background: #111827;

    border: 3px solid rgba(255, 255, 255, .20);

    box-shadow:
        0 40px 70px rgba(0, 0, 0, .32),
        0 0 0 1px rgba(0, 0, 0, .15);

    transform: rotate(3deg);

    animation: phoneFloat 5s ease-in-out infinite;
}

@keyframes phoneFloat {

    0%,
    100% {
        transform: rotate(3deg) translateY(0);
    }

    50% {
        transform: rotate(3deg) translateY(-9px);
    }

}


/* =========================================================
   PHONE SCREEN
========================================================= */

.phone-screen {
    position: relative;

    width: 100%;
    height: 100%;

    overflow: hidden;

    border-radius: 26px;

    background: #f8fafc;

    color: #111827;
}


/* =========================================================
   NOTCH
========================================================= */

.phone-notch {
    position: absolute;

    z-index: 10;

    width: 82px;
    height: 20px;

    left: 50%;
    top: 0;

    transform: translateX(-50%);

    border-radius: 0 0 13px 13px;

    background: #111827;
}


/* =========================================================
   PHONE HEADER
========================================================= */

.phone-header {
    height: 67px;

    padding: 24px 18px 8px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    background: #fff;
}

.phone-logo {
    color: var(--primary);

    font-size: 18px;
    font-weight: 900;

    letter-spacing: -1px;
}

.phone-profile {
    width: 27px;
    height: 27px;

    border-radius: 50%;

    background: #f3f4f6;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #6b7280;

    font-size: 12px;
}


/* =========================================================
   PHONE CONTENT
========================================================= */

.phone-content {
    padding: 15px;
}

.phone-greeting {
    color: #9ca3af;

    font-size: 8px;

    margin-bottom: 3px;
}

.phone-heading {
    font-size: 17px;

    font-weight: 900;

    letter-spacing: -.5px;

    margin-bottom: 13px;
}


/* =========================================================
   PHONE PROMO
========================================================= */

.phone-promo {
    position: relative;

    overflow: hidden;

    min-height: 112px;

    padding: 17px;

    border-radius: 17px;

    background: var(--primary);

    color: #fff;

    margin-bottom: 16px;
}

.phone-promo::after {
    content: "";

    position: absolute;

    width: 130px;
    height: 130px;

    border-radius: 50%;

    right: -55px;
    top: -65px;

    background: rgba(255, 255, 255, .08);
}

.phone-promo small {
    position: relative;
    z-index: 2;

    display: block;

    font-size: 7px;

    opacity: .65;

    text-transform: uppercase;

    letter-spacing: .8px;

    margin-bottom: 7px;
}

.phone-promo strong {
    position: relative;
    z-index: 2;

    display: block;

    max-width: 160px;

    font-size: 17px;

    line-height: 1.05;

    letter-spacing: -.5px;
}

.phone-promo span {
    position: relative;
    z-index: 2;

    display: block;

    margin-top: 8px;

    font-size: 7px;

    color: rgba(255, 255, 255, .60);
}


/* =========================================================
   PHONE GAME TITLE
========================================================= */

.phone-section-title {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-bottom: 8px;
}

.phone-section-title strong {
    font-size: 10px;
}

.phone-section-title span {
    color: var(--primary);

    font-size: 7px;

    font-weight: 700;
}


/* =========================================================
   PHONE GAMES
========================================================= */

.phone-games {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 8px;
}

.phone-game {
    height: 83px;

    border-radius: 12px;

    background: #fff;

    border: 1px solid #e5e7eb;

    display: flex;
    flex-direction: column;

    align-items: center;
    justify-content: center;

    gap: 6px;
}

.phone-game-icon {
    width: 30px;
    height: 30px;

    border-radius: 9px;

    background: var(--primary-light);

    color: var(--primary);

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 14px;
}

.phone-game span {
    font-size: 7px;

    font-weight: 700;

    color: #374151;

    text-align: center;
}


/* =========================================================
   FLOATING CARDS
========================================================= */

.floating-card {
    position: absolute;

    z-index: 8;

    display: flex;
    align-items: center;

    gap: 10px;

    padding: 12px 14px;

    border-radius: 13px;

    background: #fff;

    color: #111827;

    box-shadow: 0 20px 40px rgba(0, 0, 0, .22);

    animation: floatingCard 5s ease-in-out infinite;
}

@keyframes floatingCard {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-8px);
    }

}


/* =========================================================
   CARD KANAN ATAS
========================================================= */

.floating-card.promo {
    right: 8px;
    top: 82px;

    transform: rotate(-4deg);

    animation-name: floatingPromo;
}

@keyframes floatingPromo {

    0%,
    100% {
        transform: rotate(-4deg) translateY(0);
    }

    50% {
        transform: rotate(-4deg) translateY(-8px);
    }

}


/* =========================================================
   CARD KIRI BAWAH
========================================================= */

.floating-card.download {
    left: 5px;
    bottom: 76px;

    transform: rotate(4deg);

    animation-name: floatingDownload;
}

@keyframes floatingDownload {

    0%,
    100% {
        transform: rotate(4deg) translateY(0);
    }

    50% {
        transform: rotate(4deg) translateY(-8px);
    }

}


/* =========================================================
   FLOATING ICON
========================================================= */

.floating-icon {
    width: 32px;
    height: 32px;

    flex: 0 0 32px;

    border-radius: 9px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: var(--primary-light);

    color: var(--primary);

    font-size: 14px;
}

.floating-text small {
    display: block;

    color: #9ca3af;

    font-size: 6px;

    text-transform: uppercase;

    letter-spacing: .5px;

    margin-bottom: 2px;
}

.floating-text strong {
    display: block;

    color: #111827;

    font-size: 9px;

    white-space: nowrap;
}


/* =========================================================
   SCROLL
========================================================= */

.hero-scroll {
    position: absolute;

    left: 50%;
    bottom: 15px;

    transform: translateX(-50%);

    z-index: 5;

    display: flex;
    align-items: center;

    gap: 7px;

    font-size: 7px;

    color: rgba(255, 255, 255, .35);

    text-transform: uppercase;

    letter-spacing: 1px;
}

.hero-scroll i {
    font-size: 9px;
}


/* =========================================================
   1100 PX
========================================================= */

@media (max-width: 1100px) {

    .app-hero {
        min-height: 560px;

        padding-left: 30px;
        padding-right: 30px;
    }

    .hero-grid {
        max-width: 1000px;

        grid-template-columns:
            minmax(0, 1fr)
            390px;

        column-gap: 35px;
    }

    .app-hero h1 {
        font-size: 56px;
    }

    /*
     * UKURAN VISUAL TETAP SEPERTI SEBELUMNYA
     */
    .app-visual {
        height: 500px;
    }

    .visual-glow {
        width: 380px;
        height: 380px;
    }

    .visual-circle {
        width: 335px;
        height: 335px;
    }

    .app-phone {
        width: 215px;
        height: 420px;
    }

    .floating-card.promo {
        right: -2px;
    }

    .floating-card.download {
        left: -2px;
    }

}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 900px) {

    .app-hero {
        min-height: auto;

        padding-top: 65px;
        padding-bottom: 65px;
    }

    .hero-grid {
        grid-template-columns: 1fr;

        row-gap: 35px;

        max-width: 650px;
    }

    .app-hero-content {
        max-width: 650px;

        text-align: center;

        margin: 0 auto;
    }

    .app-badge {
        margin-bottom: 18px;
    }

    .app-hero h1 {
        margin-left: auto;
        margin-right: auto;

        font-size: 54px;
    }

    .app-hero-description {
        margin-left: auto;
        margin-right: auto;
    }

    .app-hero-actions {
        justify-content: center;
    }

    .hero-trust {
        justify-content: center;
    }

    .app-visual {
        height: 500px;

        max-width: 500px;

        margin: 0 auto;
    }

    .floating-card.promo {
        right: 10px;
    }

    .floating-card.download {
        left: 10px;
    }

    .hero-scroll {
        display: none;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 600px) {

    .app-hero {
        min-height: auto;

        padding:
            48px
            18px
            50px;
    }

    .hero-grid {
        width: 100%;

        row-gap: 25px;
    }

    .app-hero h1 {
        font-size: 40px;

        line-height: 1;

        letter-spacing: -2.5px;

        margin-bottom: 18px;
    }

    .app-hero-description {
        font-size: 11px;

        line-height: 1.7;

        margin-bottom: 22px;
    }

    .app-hero-actions {
        width: 100%;

        flex-direction: column;

        gap: 9px;

        margin-bottom: 20px;
    }

    .app-download-button,


    .hero-trust {
        gap: 9px;
    }

    .trust-item {
        font-size: 7px;

        gap: 5px;
    }

    .trust-item i {
        font-size: 10px;
    }

    .trust-divider {
        height: 12px;
    }

    .app-visual {
        height: 420px;

        margin-top: 5px;
    }

    .visual-glow {
        width: 315px;
        height: 315px;
    }

    .visual-circle {
        width: 285px;
        height: 285px;
    }

    .app-phone {
        width: 195px;
        height: 380px;

        border-radius: 30px;

        padding: 7px;
    }

    .phone-screen {
        border-radius: 23px;
    }

    .phone-header {
        height: 58px;

        padding:
            20px
            14px
            7px;
    }

    .phone-logo {
        font-size: 15px;
    }

    .phone-content {
        padding: 12px;
    }

    .phone-heading {
        font-size: 14px;
    }

    .phone-promo {
        min-height: 95px;

        padding: 13px;

        border-radius: 14px;
    }

    .phone-promo strong {
        font-size: 14px;
    }

    .phone-game {
        height: 68px;
    }

    .floating-card {
        padding: 10px 12px;

        gap: 8px;
    }

    .floating-icon {
        width: 29px;
        height: 29px;

        flex-basis: 29px;

        font-size: 12px;
    }

    .floating-card.promo {
        right: -4px;
        top: 35px;
    }

    .floating-card.download {
        left: -4px;
        bottom: 45px;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 420px) {

    .app-hero {
        padding-top: 40px;
    }

    .app-hero h1 {
        font-size: 35px;
    }

    .app-hero-description {
        font-size: 10px;
    }

    .hero-trust {
        gap: 7px;
    }

    .trust-item {
        font-size: 6.5px;
    }

    .app-visual {
        height: 395px;
    }

    .visual-glow {
        width: 290px;
        height: 290px;
    }

    .visual-circle {
        width: 265px;
        height: 265px;
    }

    .app-phone {
        width: 180px;
        height: 350px;

        border-radius: 28px;
    }

    .phone-screen {
        border-radius: 21px;
    }

    .phone-header {
        height: 53px;

        padding:
            18px
            12px
            6px;
    }

    .phone-content {
        padding: 10px;
    }

    .phone-promo {
        min-height: 88px;

        padding: 11px;

        margin-bottom: 12px;
    }

    .phone-promo strong {
        font-size: 13px;
    }

    .phone-games {
        gap: 6px;
    }

    .phone-game {
        height: 62px;

        gap: 4px;
    }

    .phone-game-icon {
        width: 26px;
        height: 26px;

        font-size: 12px;
    }

    .floating-card.promo {
        right: -24px;
    }

    .floating-card.download {
        left: -24px;
    }

}

</style>


<section class="app-hero">

    <div class="hero-grid">

        <div class="app-hero-content">

            <div class="app-badge">

                <i class="bi bi-stars"></i>

                Promo Eksklusif di Aplikasi Tring

            </div>


            <h1>

                Top up lebih mudah.

                <span>
                    Promo lebih banyak.
                </span>

            </h1>


            <p class="app-hero-description">

                Download aplikasi Tring dan nikmati pengalaman
                top up game yang lebih praktis. Temukan promo,
                layanan digital, dan berbagai kebutuhan gaming
                dalam satu aplikasi.

            </p>


            <div class="app-hero-actions">

                <a
                    href="#"
                    target="_blank"
                    rel="noopener"
                    class="app-download-button"
                >

                    <i class="bi bi-google-play"></i>

                    Download Aplikasi

                </a>
            </div>


            <div class="hero-trust">

                <div class="trust-item">

                    <i class="bi bi-phone"></i>

                    Android App

                </div>


                <div class="trust-divider"></div>


                <div class="trust-item">

                    <i class="bi bi-lightning-charge"></i>

                    Top Up Praktis

                </div>


                <div class="trust-divider"></div>


                <div class="trust-item">

                    <i class="bi bi-gift"></i>

                    Promo Spesial

                </div>

            </div>

        </div>


        <div class="app-visual">

            <div class="visual-glow"></div>

            <div class="visual-circle"></div>


            <div class="floating-card promo">

                <div class="floating-icon">

                    <i class="bi bi-gift"></i>

                </div>

                <div class="floating-text">

                    <small>
                        Promo hari ini
                    </small>

                    <strong>
                        Bonus spesial
                    </strong>

                </div>

            </div>


            <div class="floating-card download">

                <div class="floating-icon">

                    <i class="bi bi-download"></i>

                </div>

                <div class="floating-text">

                    <small>
                        Download sekarang
                    </small>

                    <strong>
                        Gratis di Android
                    </strong>

                </div>

            </div>


            <div class="app-phone">

                <div class="phone-screen">

                    <div class="phone-notch"></div>


                    <div class="phone-header">

                        <div class="phone-logo">
                            Tring
                        </div>

                        <div class="phone-profile">

                            <i class="bi bi-person"></i>

                        </div>

                    </div>


                    <div class="phone-content">

                        <div class="phone-greeting">
                            Selamat datang 👋
                        </div>

                        <div class="phone-heading">
                            Mau main apa?
                        </div>


                        <div class="phone-promo">

                            <small>
                                Promo khusus aplikasi
                            </small>

                            <strong>
                                Dapatkan promo
                                lebih banyak.
                            </strong>

                            <span>
                                Khusus pengguna Tring App
                            </span>

                        </div>


                        <div class="phone-section-title">

                            <strong>
                                Top Up Game
                            </strong>

                            <span>
                                Lihat semua
                            </span>

                        </div>


                        <div class="phone-games">

                            <div class="phone-game">

                                <div class="phone-game-icon">

                                    <i class="bi bi-controller"></i>

                                </div>

                                <span>
                                    Mobile Legends
                                </span>

                            </div>


                            <div class="phone-game">

                                <div class="phone-game-icon">

                                    <i class="bi bi-controller"></i>

                                </div>

                                <span>
                                    Free Fire
                                </span>

                            </div>


                            <div class="phone-game">

                                <div class="phone-game-icon">

                                    <i class="bi bi-controller"></i>

                                </div>

                                <span>
                                    PUBG Mobile
                                </span>

                            </div>


                            <div class="phone-game">

                                <div class="phone-game-icon">

                                    <i class="bi bi-controller"></i>

                                </div>

                                <span>
                                    Valorant
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="hero-scroll">

        Scroll untuk melihat game

        <i class="bi bi-chevron-down"></i>

    </div>

</section>