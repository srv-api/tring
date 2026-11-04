@extends('layouts.app')

@section('title', 'Blog - Tring Pocket Manager')

@push('styles')
<style>
/* ============================================================ */
/* CSS GLOBAL — header, footer, container                       */
/* ============================================================ */
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
.brand img { width: 42px; height: 42px; object-fit: contain; }
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
.footer-legal { display: flex; gap: 20px; flex-wrap: wrap; }

/* ============================================================ */
/* CSS BLOG HERO                                                */
/* ============================================================ */
.blog-hero {
    background: linear-gradient(120deg, #fff 25%, #fff8f7 100%);
    padding: 70px 0 50px;
    border-bottom: 1px solid var(--border);
    position: relative;
    overflow: hidden;
}
.blog-hero::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    background: var(--primary-soft);
    right: -140px;
    top: -140px;
    opacity: .5;
    pointer-events: none;
}
.blog-hero .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 13px;
    border-radius: 30px;
    background: var(--primary-light);
    border: 1px solid var(--primary-border);
    color: var(--primary);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .7px;
    text-transform: uppercase;
    margin-bottom: 20px;
}
.blog-hero h1 {
    font-size: clamp(36px, 4.5vw, 54px);
    line-height: 1.15;
    letter-spacing: -2.5px;
    font-weight: 800;
    max-width: 700px;
    color: var(--dark);
}
.blog-hero h1 span { color: var(--primary); }
.blog-hero p {
    font-size: 15px;
    line-height: 1.9;
    color: var(--muted);
    max-width: 560px;
    margin-top: 18px;
}
.category-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 32px 0 0;
}
.category-chip {
    padding: 9px 18px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 700;
    color: #615765;
    background: #fff;
    border: 1px solid var(--border);
    transition: .2s;
}
.category-chip:hover {
    border-color: var(--primary-border);
    color: var(--primary);
}
.category-chip.active {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
}

/* ============================================================ */
/* CSS BLOG LIST + SIDEBAR                                      */
/* ============================================================ */
.blog-section { padding: 60px 0 80px; background: #fff; }

/* Layout 2 kolom: artikel (kiri) + sidebar (kanan) */
.blog-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 320px;
    gap: 40px;
    align-items: start;
}

/* Grid artikel: 2 kolom di dalam area kiri */
.blog-layout .blog-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 24px;
}

.blog-card {
    display: flex;
    flex-direction: column;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 18px;
    overflow: hidden;
    transition: all .3s ease;
}
.blog-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 22px 50px rgba(52, 20, 59, .10);
    border-color: var(--primary-border);
}
.blog-card-cover {
    width: 100%;
    aspect-ratio: 16 / 10;
    overflow: hidden;
    background: var(--primary-light);
}
.blog-card-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s ease;
}
.blog-card:hover .blog-card-cover img { transform: scale(1.06); }
.blog-card-body {
    padding: 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.blog-card-cat {
    display: inline-block;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .6px;
    text-transform: uppercase;
    color: var(--primary);
    background: var(--primary-light);
    padding: 5px 10px;
    border-radius: 20px;
    margin-bottom: 14px;
    width: fit-content;
}
.blog-card-title {
    font-size: 17px;
    font-weight: 800;
    line-height: 1.35;
    color: var(--dark);
    margin-bottom: 10px;
    letter-spacing: -.4px;
}
.blog-card-excerpt {
    font-size: 13px;
    line-height: 1.75;
    color: var(--muted);
    margin-bottom: 18px;
    flex: 1;
}
.blog-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    font-size: 11px;
    color: #8d8490;
    padding-top: 16px;
    border-top: 1px solid var(--border);
    flex-wrap: wrap;
}
.blog-card-meta .author {
    display: flex;
    align-items: center;
    gap: 7px;
    font-weight: 600;
    color: #615765;
}
.blog-card-meta .author i { color: var(--primary); font-size: 13px; }
.blog-empty {
    text-align: center;
    padding: 60px 20px;
    color: var(--muted);
}
.blog-empty i {
    font-size: 44px;
    color: var(--primary-border);
    margin-bottom: 16px;
    display: block;
}

/* ============================================================ */
/* SIDEBAR KANAN                                                */
/* ============================================================ */
.blog-sidebar {
    display: flex;
    flex-direction: column;
    gap: 22px;
    position: sticky;
    top: 96px;
    align-self: start;
}

.sidebar-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 22px;
    transition: .2s;
}

.sidebar-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    font-weight: 800;
    letter-spacing: -.2px;
    color: var(--dark);
    margin-bottom: 16px;
    padding-bottom: 14px;
    border-bottom: 1px solid var(--border);
}
.sidebar-title i { color: var(--primary); font-size: 15px; }

/* SEARCH */
.sidebar-search {
    display: flex;
    gap: 8px;
    background: #faf8fa;
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 6px 6px 6px 14px;
    transition: .2s;
}
.sidebar-search:focus-within {
    border-color: var(--primary);
    background: #fff;
    box-shadow: 0 0 0 3px var(--primary-light);
}
.sidebar-search input {
    flex: 1;
    min-width: 0;
    border: none;
    background: transparent;
    outline: none;
    font-family: inherit;
    font-size: 13px;
    color: var(--dark);
    padding: 6px 0;
}
.sidebar-search input::placeholder { color: #a89cae; }
.sidebar-search button {
    border: none;
    background: var(--primary);
    color: #fff;
    width: 34px;
    height: 34px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: .2s;
    flex-shrink: 0;
}
.sidebar-search button:hover { background: var(--primary-dark); }

/* LIST KATEGORI */
.sidebar-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 4px;
}
.sidebar-list a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 12px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    color: #615765;
    transition: .2s;
}
.sidebar-list a i {
    font-size: 11px;
    color: #c9bfcc;
    transition: .2s;
}
.sidebar-list a:hover {
    background: var(--primary-light);
    color: var(--primary);
}
.sidebar-list a:hover i {
    color: var(--primary);
    transform: translateX(2px);
}
.sidebar-list a.is-active {
    background: var(--primary);
    color: #fff;
}
.sidebar-list a.is-active i { color: #fff; }

/* POPULAR POSTS */
.sidebar-popular {
    display: flex;
    flex-direction: column;
    gap: 14px;
}
.popular-item {
    display: flex;
    gap: 12px;
    align-items: center;
    padding: 6px;
    margin: -6px;
    border-radius: 10px;
    transition: .2s;
}
.popular-item:hover { background: var(--primary-light); }
.popular-thumb {
    width: 64px;
    height: 64px;
    flex-shrink: 0;
    border-radius: 10px;
    overflow: hidden;
    background: var(--primary-light);
}
.popular-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}
.popular-item:hover .popular-thumb img { transform: scale(1.08); }
.popular-info { min-width: 0; flex: 1; }
.popular-title {
    font-size: 12.5px;
    font-weight: 700;
    line-height: 1.4;
    color: var(--dark);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 6px;
}
.popular-meta {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 10.5px;
    color: #8d8490;
}
.popular-meta i { color: var(--primary); font-size: 11px; }

/* CTA CARD */
.sidebar-cta {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    border: none;
    color: #fff;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.sidebar-cta::before {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,.1);
    right: -60px;
    top: -60px;
    pointer-events: none;
}
.sidebar-cta h3 {
    font-size: 17px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 8px;
    letter-spacing: -.4px;
    position: relative;
}
.sidebar-cta p {
    font-size: 12.5px;
    line-height: 1.7;
    color: rgba(255,255,255,.85);
    margin-bottom: 16px;
    position: relative;
}
.sidebar-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    color: var(--primary);
    padding: 11px 20px;
    border-radius: 10px;
    font-size: 12.5px;
    font-weight: 800;
    transition: .2s;
    position: relative;
}
.sidebar-cta-btn:hover {
    background: #211325;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(0,0,0,.2);
}
.sidebar-cta-btn i { font-size: 13px; }

/* ============================================================ */
/* RESPONSIVE                                                   */
/* ============================================================ */
@media (max-width: 1000px) {
    .nav-links { gap: 17px; }
    .blog-layout {
        grid-template-columns: minmax(0, 1fr) 280px;
        gap: 28px;
    }
    .blog-layout .blog-grid {
        grid-template-columns: minmax(0, 1fr);
        gap: 20px;
    }
}

@media (max-width: 820px) {
    .blog-layout {
        grid-template-columns: minmax(0, 1fr);
        gap: 32px;
    }
    .blog-layout .blog-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }
    .blog-sidebar {
        position: static;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }
    .sidebar-cta { grid-column: 1 / -1; }
}

@media (max-width: 680px) {
    .container { padding: 0 20px; }
    .header { height: 68px; }
    .brand { font-size: 21px; }
    .brand img { width: 36px; height: 36px; }
    .nav { gap: 10px; }
    .nav-links { display: none; }
    .nav-cta { padding: 11px 13px; font-size: 11px; }
    .blog-hero { padding: 50px 0 40px; }
    .blog-section { padding: 40px 0 60px; }
    .blog-layout .blog-grid {
        grid-template-columns: minmax(0, 1fr);
        gap: 18px;
    }
    .blog-sidebar { grid-template-columns: minmax(0, 1fr); }
    .blog-card-title { font-size: 17px; }
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
    {{-- BLOG HERO --}}
    <section class="blog-hero">
        <div class="container">
            <div class="eyebrow">
                <i class="bi bi-journal-text"></i>
                Tring Blog
            </div>
            <h1>Insight, tips, dan <span>cerita dari Tring.</span></h1>
            <p>
                Jelajahi artikel seputar manajemen keuangan, tips digital,
                keamanan, dan update terbaru dari Tring Pocket Manager.
            </p>

            <div class="category-filter">
                @foreach ($categories as $cat)
                    <a href="{{ route('blog.index', $cat === 'Semua' ? [] : ['category' => $cat]) }}"
                       class="category-chip {{ $activeCategory === $cat ? 'active' : '' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BLOG LAYOUT: Artikel + Sidebar --}}
    <section class="blog-section">
        <div class="container">
            <div class="blog-layout">

                {{-- ARTIKEL (kiri) --}}
                <div class="blog-main">
                    @if (count($articles))
                        <div class="blog-grid">
                            @foreach ($articles as $article)
                                <a href="{{ route('blog.show', $article['slug']) }}" class="blog-card">
                                    <div class="blog-card-cover">
                                        <img src="{{ $article['cover'] }}" alt="{{ $article['title'] }}" loading="lazy">
                                    </div>
                                    <div class="blog-card-body">
                                        <span class="blog-card-cat">{{ $article['category'] }}</span>
                                        <h2 class="blog-card-title">{{ $article['title'] }}</h2>
                                        <p class="blog-card-excerpt">{{ $article['excerpt'] }}</p>
                                        <div class="blog-card-meta">
                                            <span class="author">
                                                <i class="bi bi-person-circle"></i>
                                                {{ $article['author'] }}
                                            </span>
                                            <span>{{ \Carbon\Carbon::parse($article['date'])->translatedFormat('d M Y') }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="blog-empty">
                            <i class="bi bi-inbox"></i>
                            <p>Belum ada artikel di kategori ini.</p>
                        </div>
                    @endif
                </div>

                {{-- SIDEBAR (kanan) — inline, tidak pakai @include --}}
                <aside class="blog-sidebar">

                    {{-- SEARCH --}}
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">
                            <i class="bi bi-search"></i>
                            Cari Artikel
                        </h3>
                        <form action="{{ route('blog.index') }}" method="GET" class="sidebar-search">
                            <input type="text"
                                   name="q"
                                   placeholder="Cari artikel..."
                                   value="{{ request('q') }}"
                                   aria-label="Cari artikel">
                            <button type="submit" aria-label="Cari">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>

                    {{-- KATEGORI --}}
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">
                            <i class="bi bi-tags"></i>
                            Kategori
                        </h3>
                        <ul class="sidebar-list">
                            @foreach ($categories as $cat)
                                <li>
                                    <a href="{{ route('blog.index', $cat === 'Semua' ? [] : ['category' => $cat]) }}"
                                       class="{{ $activeCategory === $cat ? 'is-active' : '' }}">
                                        <span>{{ $cat }}</span>
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- ARTIKEL POPULER --}}
                    @if (!empty($popular))
                        <div class="sidebar-card">
                            <h3 class="sidebar-title">
                                <i class="bi bi-fire"></i>
                                Artikel Populer
                            </h3>
                            <div class="sidebar-popular">
                                @foreach ($popular as $pop)
                                    <a href="{{ route('blog.show', $pop['slug']) }}" class="popular-item">
                                        <div class="popular-thumb">
                                            <img src="{{ $pop['cover'] }}" alt="{{ $pop['title'] }}" loading="lazy">
                                        </div>
                                        <div class="popular-info">
                                            <div class="popular-title">{{ $pop['title'] }}</div>
                                            <div class="popular-meta">
                                                <i class="bi bi-calendar3"></i>
                                                {{ \Carbon\Carbon::parse($pop['date'])->translatedFormat('d M Y') }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- CTA DOWNLOAD --}}
                    <div class="sidebar-card sidebar-cta">
                        <h3>Download Tring</h3>
                        <p>Kelola aktivitas harian dalam satu aplikasi.</p>
                        <a href="{{ url('/#download') }}" class="sidebar-cta-btn">
                            Download App
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                </aside>

            </div>
        </div>
    </section>
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