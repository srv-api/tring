
@extends('layouts.app')

@section('title', ($article->seo_title ?: $article->title) . ' - Tring Blog')

@push('styles')
<style>
:root {
    --primary: #cd130a;
    --primary-dark: #a30f08;
    --primary-light: #fff0ef;
    --primary-soft: #fde2e0;
    --primary-border: #f5c5c2;
    --dark: #240D27;
    --muted: #77717D;
    --border: #EEE7F0;
}

*, *::before, *::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    width: 100%;
    max-width: 100%;
    scroll-behavior: smooth;
    scroll-padding-top: 90px;
    overflow-x: clip;
}

body {
    width: 100%;
    max-width: 100%;
    overflow-x: clip;
    font-family: 'Inter', sans-serif;
    color: var(--dark);
    background: #fff;
    -webkit-font-smoothing: antialiased;
}

a { text-decoration: none; color: inherit; }

.container {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    padding: 0 28px;
}

/* HEADER */
.header {
    width: 100%;
    height: 78px;
    background: rgba(255,255,255,.96);
    border-bottom: 1px solid #f0eaf1;
    display: flex;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 100;
}

.nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    min-width: 0;
}

.brand {
    display: flex;
    align-items: center;
    gap: 11px;
    font-size: 23px;
    font-weight: 800;
    letter-spacing: -1px;
    flex-shrink: 0;
}

.brand img {
    width: 42px;
    height: 42px;
    object-fit: contain;
}

.brand span { color: var(--primary); }

.nav-links {
    display: flex;
    align-items: center;
    gap: 32px;
    font-size: 13px;
    font-weight: 600;
    color: #615765;
}

.nav-links a { transition: .2s; }
.nav-links a:hover { color: var(--primary); }

.nav-cta {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: var(--primary);
    color: #fff;
    padding: 13px 20px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 700;
    transition: .2s;
    white-space: nowrap;
    flex-shrink: 0;
}

.nav-cta:hover {
    background: var(--primary-dark);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(205,19,10,.2);
}

/* FOOTER */
.footer {
    width: 100%;
    max-width: 100%;
    background: #980000;
    color: #fff;
    padding: 48px 0 0;
    overflow: hidden;
    border-top: 3px solid var(--primary);
}

.footer-main {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
    padding-bottom: 35px;
}

.footer-brand { min-width: 0; }
.footer-brand .brand { color: #fff; }
.footer-brand .brand span { color: #fff; }

.footer-brand p {
    font-size: 13px;
    line-height: 1.9;
    color: #fff;
    max-width: 330px;
    margin-top: 17px;
}

.footer-social {
    display: flex;
    gap: 10px;
    margin-top: 18px;
    flex-wrap: wrap;
}

.social-link {
    width: 36px;
    height: 36px;
    border: 1px solid #fff;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #e6dce9;
    transition: .2s;
}

.social-link:hover {
    background: var(--primary);
    border-color: var(--primary);
    color: #fff;
    transform: translateY(-2px);
}

.footer-right { min-width: 0; text-align: right; }
.footer-right h3 { font-size: 13px; margin-bottom: 12px; }

.footer-right p {
    font-size: 13px;
    line-height: 1.9;
    color: #fff;
    max-width: 300px;
}

.footer-downloads {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    flex-wrap: wrap;
    margin-top: 15px;
}

.footer-download {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    color: var(--primary);
    padding: 11px 14px;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 800;
    transition: .2s;
}

.footer-download:hover {
    background: var(--primary);
    color: #fff;
    transform: translateY(-2px);
}

.footer-download i { font-size: 17px; }

.footer-bottom {
    border-top: 1px solid #49394d;
    min-height: 64px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    font-size: 11px;
    color: #fff;
    flex-wrap: wrap;
    padding: 12px 0;
}

.footer-bottom a { transition: .2s; }
.footer-bottom a:hover { color: var(--primary); }

.footer-legal {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

/* BREADCRUMB */
.breadcrumb-bar {
    background: #faf8fa;
    border-bottom: 1px solid var(--border);
    padding: 16px 0;
    font-size: 12px;
    color: #8d8490;
}

.breadcrumb-bar a { color: var(--muted); transition: .2s; }
.breadcrumb-bar a:hover { color: var(--primary); }
.breadcrumb-bar .sep { margin: 0 8px; color: #c9bfcc; }
.breadcrumb-bar .current { color: var(--dark); font-weight: 600; }

/* ARTICLE HERO */
.article-hero {
    padding: 60px 0 40px;
    background: linear-gradient(120deg, #fff 30%, #fff8f7 100%);
}

.article-hero .container { max-width: 860px; }

.article-cat {
    display: inline-block;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .6px;
    text-transform: uppercase;
    color: var(--primary);
    background: var(--primary-light);
    padding: 6px 12px;
    border-radius: 20px;
    margin-bottom: 20px;
}

.article-title {
    font-size: clamp(30px, 4vw, 46px);
    line-height: 1.2;
    letter-spacing: -1.8px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 22px;
}

.article-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    font-size: 13px;
    color: var(--muted);
    align-items: center;
}

.article-meta span {
    display: inline-flex;
    align-items: center;
    gap: 7px;
}

.article-meta i {
    color: var(--primary);
    font-size: 15px;
}

/* COVER */
.article-cover {
    max-width: 960px;
    margin: 0 auto;
    padding: 0 28px;
}

.article-cover img {
    width: 100%;
    aspect-ratio: 16 / 8;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(52,20,59,.12);
}

/* ARTICLE CONTENT */
.article-body {
    max-width: 760px;
    margin: 50px auto 80px;
    padding: 0 28px;
    font-size: 16px;
    line-height: 1.9;
    color: #423a48;
    overflow-wrap: anywhere;
}

.article-body h2 {
    font-size: 26px;
    font-weight: 800;
    letter-spacing: -1px;
    color: var(--dark);
    margin: 40px 0 16px;
}

.article-body h3 {
    font-size: 20px;
    font-weight: 800;
    color: var(--dark);
    margin: 32px 0 12px;
}

.article-body p { margin-bottom: 18px; }

.article-body ul,
.article-body ol {
    margin: 0 0 20px 22px;
}

.article-body li { margin-bottom: 8px; }

.article-body a {
    color: var(--primary);
    font-weight: 600;
    text-decoration: underline;
}

.article-body strong { color: var(--dark); }

.article-body blockquote {
    border-left: 4px solid var(--primary);
    background: var(--primary-light);
    padding: 18px 22px;
    border-radius: 10px;
    font-style: italic;
    color: var(--dark);
    margin: 26px 0;
    font-size: 16px;
}

.article-body img {
    max-width: 100%;
    height: auto;
    border-radius: 14px;
    margin: 20px 0;
}

.article-body iframe {
    max-width: 100%;
}

.article-body table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.article-body th,
.article-body td {
    padding: 10px;
    border: 1px solid var(--border);
}

/* SHARE */
.share-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 22px 0;
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    margin-top: 40px;
    flex-wrap: wrap;
}

.share-bar strong {
    font-size: 13px;
    color: var(--dark);
}

.share-links {
    display: flex;
    gap: 9px;
}

.share-links a {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    border: 1px solid var(--border);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #615765;
    font-size: 15px;
    transition: .2s;
}

.share-links a:hover {
    background: var(--primary);
    border-color: var(--primary);
    color: #fff;
    transform: translateY(-2px);
}

/* RELATED */
.related-section {
    background: #faf8fa;
    padding: 60px 0 80px;
    border-top: 1px solid var(--border);
}

.related-section h2 {
    font-size: 26px;
    font-weight: 800;
    letter-spacing: -1px;
    color: var(--dark);
    margin-bottom: 26px;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 24px;
}

.related-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    transition: all .3s ease;
}

.related-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 40px rgba(52,20,59,.10);
    border-color: var(--primary-border);
}

.related-cover {
    width: 100%;
    aspect-ratio: 16 / 10;
    overflow: hidden;
    background: var(--primary-light);
}

.related-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s ease;
}

.related-card:hover .related-cover img {
    transform: scale(1.06);
}

.related-body { padding: 18px; }

.related-cat {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .5px;
    text-transform: uppercase;
    color: var(--primary);
    display: block;
    margin-bottom: 10px;
}

.related-title {
    font-size: 15px;
    font-weight: 800;
    line-height: 1.4;
    color: var(--dark);
    letter-spacing: -.3px;
}

/* RESPONSIVE */
@media (max-width: 1000px) {
    .nav-links { gap: 17px; }
    .related-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}

@media (max-width: 680px) {
    .container { padding: 0 20px; }
    .header { height: 68px; }
    .brand { font-size: 21px; }
    .brand img { width: 36px; height: 36px; }
    .nav { gap: 10px; }
    .nav-links { display: none; }
    .nav-cta { padding: 11px 13px; font-size: 11px; }
    .article-hero { padding: 40px 0 30px; }
    .article-body {
        font-size: 15px;
        padding: 0 20px;
        margin-top: 32px;
    }
    .article-cover { padding: 0 20px; }
    .article-body h2 { font-size: 22px; }
    .related-grid { grid-template-columns: minmax(0, 1fr); }
    .footer-main { flex-direction: column; gap: 30px; }
    .footer-right { width: 100%; text-align: left; }
    .footer-downloads { justify-content: flex-start; }
    .footer-bottom {
        align-items: flex-start;
        flex-direction: column;
        padding: 20px 0;
    }
    .footer-legal { gap: 16px; }
}

@media (max-width: 380px) {
    .container { padding: 0 14px; }
    .footer-legal { gap: 12px; }
}

@supports not (overflow: clip) {
    html, body { overflow-x: hidden; }
}
</style>
@endpush

@section('content')

{{-- HEADER --}}
<header class="header">
    <div class="container nav">

        <a href="{{ url('/') }}" class="brand" aria-label="Tring Pocket Manager">
            <img src="{{ asset('tring.png') }}" alt="Logo Tring">
            <span>Tring.</span>
        </a>

        <nav class="nav-links" aria-label="Navigasi utama">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/#tentang') }}">Tentang</a>
            <a href="{{ route('blog.index') }}">Blog</a>
        </nav>

        <a href="{{ url('/#download') }}" class="nav-cta">
            Download App
            <i class="bi bi-arrow-up-right"></i>
        </a>

    </div>
</header>

<main>

    {{-- BREADCRUMB --}}
    <div class="breadcrumb-bar">
        <div class="container">

            <a href="{{ url('/') }}">Beranda</a>

            <span class="sep">/</span>

            <a href="{{ route('blog.index') }}">Blog</a>

            <span class="sep">/</span>

            <span class="current">
                {{ Str::limit($article->title, 50) }}
            </span>

        </div>
    </div>

    {{-- ARTICLE HERO --}}
    <section class="article-hero">
        <div class="container">

            <span class="article-cat">
                {{ $article->category?->name ?? 'Umum' }}
            </span>

            <h1 class="article-title">
                {{ $article->title }}
            </h1>

            <div class="article-meta">

                <span>
                    <i class="bi bi-person-circle"></i>
                    {{ $article->user?->name ?? 'Tim Tring' }}
                </span>

                <span>
                    <i class="bi bi-calendar3"></i>
                    {{ $article->published_at?->translatedFormat('d F Y') }}
                </span>

                <span>
                    <i class="bi bi-clock"></i>
                    {{ max(1, ceil(str_word_count(strip_tags($article->content)) / 200)) }} menit baca
                </span>

            </div>

        </div>
    </section>

    {{-- COVER --}}
    <div class="article-cover">

        <img
            src="{{ $article->thumbnail
                ? asset('storage/' . $article->thumbnail)
                : asset('images/default-blog.jpg') }}"
            alt="{{ $article->title }}"
            fetchpriority="high"
        >

    </div>

    {{-- ARTICLE BODY --}}
   {{-- ARTICLE BODY --}}
<article class="article-body">

    @php
        $content = trim($article->content ?? '');

        // Jika konten sudah berisi HTML, tampilkan sebagai HTML.
        $containsHtml = $content !== '' && $content !== strip_tags($content);
    @endphp

    @if($containsHtml)
        {!! $content !!}
    @else
        @foreach(preg_split('/\r\n|\r|\n/', $content) as $paragraph)
            @if(trim($paragraph) !== '')
                <p>{{ trim($paragraph) }}</p>
            @endif
        @endforeach
    @endif

    {{-- SHARE --}}
    <div class="share-bar">
        <strong>Bagikan artikel ini:</strong>

        <div class="share-links">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
               target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                <i class="bi bi-facebook"></i>
            </a>

            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}"
               target="_blank" rel="noopener noreferrer" aria-label="X">
                <i class="bi bi-twitter-x"></i>
            </a>

            <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}"
               target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>

            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
               target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                <i class="bi bi-linkedin"></i>
            </a>
        </div>
    </div>

</article>

    {{-- RELATED ARTICLES --}}
    @if($related->isNotEmpty())

        <section class="related-section">

            <div class="container">

                <h2>Artikel terkait</h2>

                <div class="related-grid">

                    @foreach($related as $item)

                        <a
                            href="{{ route('blog.show', $item->slug) }}"
                            class="related-card"
                        >

                            <div class="related-cover">

                                <img
                                    src="{{ $item->thumbnail
                                        ? asset('storage/' . $item->thumbnail)
                                        : asset('images/default-blog.jpg') }}"
                                    alt="{{ $item->title }}"
                                    loading="lazy"
                                >

                            </div>

                            <div class="related-body">

                                <span class="related-cat">
                                    {{ $item->category?->name ?? 'Umum' }}
                                </span>

                                <div class="related-title">
                                    {{ $item->title }}
                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

        </section>

    @endif

</main>

{{-- FOOTER --}}
<footer class="footer">

    <div class="container">

        <div class="footer-main">

            <div class="footer-brand">

                <a href="{{ url('/') }}" class="brand">
                    <img src="{{ asset('tring.png') }}" alt="Logo Tring">
                    <span>Tring.</span>
                </a>

                <p>
                    Tring Pocket Manager, teman digital untuk membantu
                    kebutuhan sehari-hari menjadi lebih praktis,
                    mudah, dan efisien.
                </p>

                <div class="footer-social">

                    <a href="https://instagram.com/tring.id"
                       class="social-link"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="https://bsky.app/profile/tringid.bsky.social"
                       class="social-link"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Bluesky">
                        <i class="bi bi-bluesky"></i>
                    </a>

                    <a href="https://tiktok.com/@tring_id"
                       class="social-link"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>

                    <a href="https://x.com/tring_id"
                       class="social-link"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="X">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                </div>

            </div>

            <div class="footer-right">

                <h3>Mulai gunakan Tring</h3>

                <p>
                    Jadikan aktivitas sehari-hari lebih mudah
                    bersama Tring Pocket Manager.
                </p>

                <div class="footer-downloads">

                    <a href="{{ $playStoreUrl ?? '#' }}"
                       class="footer-download"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-google-play"></i>
                        Google Play
                    </a>

                    <a href="{{ $appStoreUrl ?? '#' }}"
                       class="footer-download"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-apple"></i>
                        App Store
                    </a>

                </div>

            </div>

        </div>

        <div class="footer-bottom">

            <span>
                © {{ date('Y') }} Tring Pocket Manager. All rights reserved.
            </span>

            <div class="footer-legal">

                <a href="{{ url('/privacy-policy') }}">
                    Kebijakan Privasi
                </a>

                <a href="{{ url('/terms') }}">
                    Syarat &amp; Ketentuan
                </a>

            </div>

        </div>

    </div>

</footer>

@endsection
