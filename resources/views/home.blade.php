@extends('layouts.app')

@section('title', 'Tring - Pocket Manager')

@push('styles')
<style>
:root{--primary:#7F0079;--primary-dark:#650061;--dark:#240D27;--muted:#77717D;--border:#EEE7F0}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth;scroll-padding-top:90px}
body{font-family:'Inter',sans-serif;color:var(--dark);background:#fff;-webkit-font-smoothing:antialiased}
a{text-decoration:none;color:inherit}
.container{width:100%;max-width:1200px;margin:auto;padding:0 28px}

/* HEADER */
.header{height:78px;background:rgba(255,255,255,.96);border-bottom:1px solid #f0eaf1;display:flex;align-items:center;position:sticky;top:0;z-index:100}
.nav{display:flex;align-items:center;justify-content:space-between;gap:24px}
.brand{display:flex;align-items:center;gap:11px;font-size:23px;font-weight:800;letter-spacing:-1px}
.brand img{width:42px;height:42px;object-fit:contain}
.brand span{color:var(--primary)}
.nav-links{display:flex;align-items:center;gap:32px;font-size:13px;font-weight:600;color:#615765}
.nav-links a:hover{color:var(--primary)}
.nav-cta{display:inline-flex;align-items:center;gap:9px;background:var(--primary);color:#fff;padding:13px 20px;border-radius:10px;font-size:13px;font-weight:700;transition:.2s}
.nav-cta:hover{background:var(--primary-dark);transform:translateY(-2px)}

/* HERO */
.hero{position:relative;overflow:hidden;background:linear-gradient(120deg,#fff 25%,#fcf5fc 100%);min-height:650px;display:flex;align-items:center}
.hero:before{content:"";position:absolute;width:520px;height:520px;border-radius:50%;background:#f4e2f5;filter:blur(2px);right:-140px;top:35px;opacity:.65}
.hero:after{content:"";position:absolute;width:240px;height:240px;border:1px solid #e8cce9;border-radius:50%;right:7%;top:14%;opacity:.7}
.hero-grid{display:grid;grid-template-columns:1.05fr .95fr;align-items:center;gap:60px;padding-top:65px;padding-bottom:65px;position:relative;z-index:1}
.eyebrow{display:inline-flex;align-items:center;gap:8px;padding:9px 13px;border-radius:30px;background:#f4e6f5;color:var(--primary);font-size:11px;font-weight:800;letter-spacing:.7px;text-transform:uppercase;margin-bottom:25px}
.eyebrow i{font-size:14px}
.hero h1{font-size:clamp(42px,5vw,65px);line-height:1.12;letter-spacing:-3.2px;font-weight:800;max-width:600px}
.hero h1 span{color:var(--primary)}
.hero-desc{font-size:15px;line-height:1.9;color:var(--muted);max-width:480px;margin:23px 0 28px}

/* DOWNLOAD BADGES */
.hero-actions{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.store-buttons{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.store-btn{display:flex;align-items:center;gap:11px;min-width:190px;min-height:60px;padding:10px 15px;background:#211325;color:#fff;border:1px solid #211325;border-radius:10px;transition:all .25s ease}
.store-btn:hover{background:var(--primary);border-color:var(--primary);transform:translateY(-3px);box-shadow:0 8px 22px #7f007926}
.store-btn>i{font-size:30px;line-height:1}
.store-text{display:flex;flex-direction:column;gap:4px}
.store-text small{font-size:9px;font-weight:500;letter-spacing:.4px;color:#e0d4e2}
.store-text strong{font-size:14px;font-weight:700;white-space:nowrap}
.hero-note{display:flex;align-items:center;gap:8px;margin-top:23px;color:#827886;font-size:11px;line-height:1.7}
.hero-note i{color:#188b57;font-size:15px}

/* APP MOCKUP */
.visual{position:relative;min-height:490px;display:flex;justify-content:center;align-items:center}
.visual-glow{position:absolute;width:370px;height:370px;border-radius:50%;background:linear-gradient(145deg,#eac7ed,#f9eafa);opacity:.8}
.phone{position:relative;width:255px;height:475px;background:#211325;border:7px solid #211325;border-radius:38px;padding:8px;box-shadow:0 32px 75px #32113d30;transform:rotate(-5deg);z-index:2}
.phone-screen{height:100%;background:#fff;border-radius:26px;overflow:hidden;padding:24px 14px}
.phone-notch{width:75px;height:17px;background:#211325;border-radius:20px;margin:-17px auto 22px;position:relative}
.app-top{display:flex;justify-content:space-between;align-items:center;font-size:11px;font-weight:800;margin-bottom:23px}
.app-logo{display:flex;align-items:center;gap:6px;color:var(--primary)}
.app-logo i{font-size:17px}
.avatar{width:28px;height:28px;background:#f2dff3;border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--primary)}
.balance-card{background:linear-gradient(135deg,#8b0784,#59005e);padding:18px 14px;border-radius:16px;color:#fff}
.balance-label{font-size:9px;opacity:.85}
.balance-amount{font-size:23px;font-weight:800;margin:9px 0 15px;letter-spacing:-.8px}
.balance-bottom{display:flex;justify-content:space-between;font-size:9px;opacity:.9}
.app-section{display:flex;align-items:center;justify-content:space-between;margin:22px 0 13px;font-size:11px;font-weight:800}
.app-section small{font-size:9px;color:var(--primary);font-weight:600}
.quick-actions{display:grid;grid-template-columns:repeat(4,1fr);gap:8px;text-align:center}
.quick-icon{width:39px;height:39px;border-radius:12px;background:#f8eafa;display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:17px;margin:0 auto 7px}
.quick-actions span{font-size:8px;color:#625668}
.transaction{display:flex;align-items:center;gap:9px;margin-top:13px}
.transaction-icon{width:32px;height:32px;flex-shrink:0;display:flex;align-items:center;justify-content:center;border-radius:10px;background:#f1f5ed;color:#4e8c42}
.transaction-info{flex:1;min-width:0}
.transaction-info b{display:block;font-size:9px;margin-bottom:4px}
.transaction-info small{font-size:8px;color:#8d8490}
.transaction-amount{font-size:9px;font-weight:800}
.floating-card{position:absolute;z-index:3;background:#fff;padding:15px 17px;border-radius:15px;box-shadow:0 15px 40px #34143b18}
.float-one{top:75px;right:-5px;transform:rotate(4deg)}
.float-two{bottom:64px;left:-12px;transform:rotate(-3deg)}
.float-title{font-size:10px;color:#8b818f;margin-bottom:8px}
.float-value{font-size:17px;font-weight:800}
.float-icon{display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center;background:#f5e5f6;border-radius:9px;color:var(--primary);margin-right:8px}

/* FOOTER */
.footer{background:#211325;color:#fff;padding:48px 0 0}
.footer-main{display:flex;justify-content:space-between;align-items:flex-start;gap:40px;padding-bottom:35px}
.footer-brand .brand{color:#fff}
.footer-brand .brand span{color:#fff}
.footer-brand p{font-size:12px;line-height:1.9;color:#b8aebc;max-width:330px;margin-top:17px}
.footer-social{display:flex;gap:10px;margin-top:18px}
.social-link{width:36px;height:36px;border:1px solid #514155;border-radius:10px;display:flex;align-items:center;justify-content:center;color:#e6dce9;transition:.2s}
.social-link:hover{background:var(--primary);border-color:var(--primary);color:#fff}
.footer-right{text-align:right}
.footer-right h3{font-size:13px;margin-bottom:12px}
.footer-right p{font-size:12px;line-height:1.9;color:#b8aebc;max-width:300px}
.footer-downloads{display:flex;gap:10px;justify-content:flex-end;flex-wrap:wrap;margin-top:15px}
.footer-download{display:inline-flex;align-items:center;gap:8px;background:#fff;color:var(--primary);padding:11px 14px;border-radius:9px;font-size:12px;font-weight:800;transition:.2s}
.footer-download:hover{background:#f5e5f6;transform:translateY(-2px)}
.footer-download i{font-size:17px}
.footer-bottom{border-top:1px solid #49394d;min-height:64px;display:flex;align-items:center;justify-content:space-between;gap:15px;font-size:11px;color:#b8aebc}
.footer-bottom a:hover{color:#fff}
.footer-legal{display:flex;gap:20px}

/* RESPONSIVE */
@media(max-width:1000px){
.hero-grid{gap:25px;grid-template-columns:1fr 1fr}
.hero h1{font-size:47px;letter-spacing:-2px}
.visual{transform:scale(.88);transform-origin:center}
.float-one{right:-15px}
.float-two{left:-20px}
.nav-links{gap:17px}
.store-buttons{gap:9px}
.store-btn{min-width:175px;padding:10px 12px}
}
@media(max-width:680px){
.container{padding:0 20px}
.header{height:68px}
.brand{font-size:21px}
.brand img{width:36px;height:36px}
.nav-links{display:none}
.nav-cta{padding:11px 13px;font-size:11px}
.hero{min-height:auto}
.hero-grid{grid-template-columns:1fr;gap:15px;padding-top:55px;padding-bottom:35px}
.hero h1{font-size:45px;letter-spacing:-2.2px}
.hero-desc{font-size:14px}
.hero-actions,.store-buttons{width:100%}
.store-buttons{gap:10px}
.store-btn{flex:1;min-width:0;padding:11px 10px;gap:8px}
.store-btn>i{font-size:25px}
.store-text small{font-size:8px}
.store-text strong{font-size:11px}
.visual{min-height:465px;transform:scale(.9);margin:0 -20px}
.float-one{right:0}
.float-two{left:0}
.footer-main{flex-direction:column;gap:30px}
.footer-right{text-align:left}
.footer-downloads{justify-content:flex-start}
.footer-bottom{align-items:flex-start;flex-direction:column;padding:20px 0}
.footer-legal{gap:16px;flex-wrap:wrap}
}
@media(max-width:380px){
.hero h1{font-size:38px}
.store-buttons{flex-direction:column;align-items:stretch}
.store-btn{width:100%;min-height:58px}
.visual{transform:scale(.8);margin:-15px -30px}
}
</style>
@endpush

@section('content')
<header class="header">
    <div class="container nav">
        <a href="{{ url('/') }}" class="brand" aria-label="Tring Pocket Manager">
            <img src="{{ asset('tring.png') }}" alt="Logo Tring">
            <span>Tring.</span>
        </a>
        <nav class="nav-links" aria-label="Navigasi utama">
            <a href="#beranda">Beranda</a>
            <a href="#tentang">Tentang Tring</a>
        </nav>
        <a href="#download" class="nav-cta">Download App <i class="bi bi-arrow-up-right"></i></a>
    </div>
</header>

<main>
    <section class="hero" id="beranda">
        <div class="container hero-grid">
            <div class="hero-content">
                <div class="eyebrow"><i class="bi bi-stars"></i> Your Everyday Pocket Manager</div>
                <h1>Satu aplikasi untuk <span>semua kebutuhan.</span></h1>
                <p class="hero-desc">Kenalkan Tring, partner digital yang membantu aktivitas sehari-hari jadi lebih praktis. Semua kebutuhan dalam satu genggaman, kapan saja dan di mana saja.</p>

                <div class="hero-actions" id="download">
                    <div class="store-buttons">
                        <a href="{{ $playStoreUrl ?? '#' }}" class="store-btn" target="_blank" rel="noopener noreferrer" aria-label="Get it on Google Play">
                            <i class="bi bi-google-play"></i>
                            <span class="store-text">
                                <small>GET IT ON</small>
                                <strong>Google Play</strong>
                            </span>
                        </a>
                        <a href="{{ $appStoreUrl ?? '#' }}" class="store-btn" target="_blank" rel="noopener noreferrer" aria-label="Download on the App Store">
                            <i class="bi bi-apple"></i>
                            <span class="store-text">
                                <small>Download on the</small>
                                <strong>App Store</strong>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="hero-note"><i class="bi bi-shield-check"></i> Praktis, mudah digunakan, dan dalam satu aplikasi.</div>
            </div>

            <div class="visual" id="tentang" aria-label="Ilustrasi aplikasi Tring">
                <div class="visual-glow"></div>
                <div class="floating-card float-one">
                    <div class="float-title">Aktivitas lebih praktis</div>
                    <div class="float-value"><i class="bi bi-lightning-charge-fill" style="color:#7F0079"></i> Serba mudah</div>
                </div>

                <div class="phone">
                    <div class="phone-screen">
                        <div class="phone-notch"></div>
                        <div class="app-top">
                            <div class="app-logo"><i class="bi bi-stars"></i> Tring.</div>
                            <div class="avatar"><i class="bi bi-person-fill"></i></div>
                        </div>
                        <div class="balance-card">
                            <div class="balance-label">Selamat datang di</div>
                            <div class="balance-amount">Pocket Manager</div>
                            <div class="balance-bottom"><span>Satu aplikasi</span><span>Beragam kebutuhan ✦</span></div>
                        </div>
                        <div class="app-section">Jelajahi Tring <small>Lebih praktis →</small></div>
                        <div class="quick-actions">
                            <div><div class="quick-icon"><i class="bi bi-wallet2"></i></div><span>Dompet</span></div>
                            <div><div class="quick-icon"><i class="bi bi-phone"></i></div><span>Digital</span></div>
                            <div><div class="quick-icon"><i class="bi bi-lightning"></i></div><span>Praktis</span></div>
                            <div><div class="quick-icon"><i class="bi bi-grid"></i></div><span>Lainnya</span></div>
                        </div>
                        <div class="app-section">Aktivitas <small>Lihat semua</small></div>
                        <div class="transaction">
                            <div class="transaction-icon"><i class="bi bi-check-lg"></i></div>
                            <div class="transaction-info"><b>Aktivitas harian</b><small>Semua lebih terorganisir</small></div>
                            <div class="transaction-amount">Mudah</div>
                        </div>
                        <div class="transaction">
                            <div class="transaction-icon" style="background:#f7e9f7;color:#7F0079"><i class="bi bi-stars"></i></div>
                            <div class="transaction-info"><b>Pengalaman Tring</b><small>Dalam satu genggaman</small></div>
                            <div class="transaction-amount">Tring</div>
                        </div>
                    </div>
                </div>

                <div class="floating-card float-two">
                    <div style="display:flex;align-items:center">
                        <div class="float-icon"><i class="bi bi-phone"></i></div>
                        <div><div class="float-title">Partner digitalmu</div><div class="float-value">Selalu praktis</div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="footer">
    <div class="container">
        <div class="footer-main">
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="brand">
                    <img src="{{ asset('tring.png') }}" alt="Logo Tring">
                    <span>Tring.</span>
                </a>
                <p>Tring Pocket Manager, teman digital untuk membantu kebutuhan sehari-hari menjadi lebih praktis, mudah, dan efisien.</p>
                <div class="footer-social">
                    <a href="https://instagram.com/tring.id" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://bsky.app/profile/tringid.bsky.social" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Bluesky"><i class="bi bi-bluesky"></i></a>
                    <a href="https://tiktok.com/@tring_id" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                    <a href="https://x.com/tring_id" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>

            <div class="footer-right">
                <h3>Mulai gunakan Tring</h3>
                <p>Jadikan aktivitas sehari-hari lebih mudah bersama Tring Pocket Manager.</p>
                <div class="footer-downloads">
                    <a href="{{ $playStoreUrl ?? '#' }}" class="footer-download" target="_blank" rel="noopener noreferrer"><i class="bi bi-google-play"></i> Google Play</a>
                    <a href="{{ $appStoreUrl ?? '#' }}" class="footer-download" target="_blank" rel="noopener noreferrer"><i class="bi bi-apple"></i> App Store</a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <span>© {{ date('Y') }} Tring Pocket Manager. All rights reserved.</span>
            <div class="footer-legal">
                <a href="{{ url('/privacy-policy') }}">Kebijakan Privasi</a>
                <a href="{{ url('/terms') }}">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </div>
</footer>
@endsection
