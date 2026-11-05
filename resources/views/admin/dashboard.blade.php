
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Tring CMS</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #7F0079;
            --primary-light: #f9edfa;
            --text: #242124;
            --muted: #858085;
            --border: #eee9ee;
            --background: #f8f7f9;
            --sidebar-width: 250px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #fff;
            border-right: 1px solid var(--border);
            padding: 25px 17px;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 12px;
            margin-bottom: 38px;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            background: var(--primary);
            color: white;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand-name span {
            color: var(--primary);
        }

        .menu-label {
            font-size: 10px;
            font-weight: 700;
            color: #aaa3aa;
            letter-spacing: 1px;
            padding: 0 12px;
            margin: 20px 0 10px;
            text-transform: uppercase;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 11px 13px;
            border-radius: 8px;
            color: #716b71;
            font-size: 13px;
            font-weight: 500;
            transition: .2s;
        }

        .menu a i {
            font-size: 17px;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid var(--border);
            padding-top: 16px;
        }

        .main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .topbar {
            height: 72px;
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .page-title {
            font-size: 17px;
            font-weight: 700;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .notification {
            width: 36px;
            height: 36px;
            border: 1px solid var(--border);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 17px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 37px;
            height: 37px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-name {
            font-weight: 600;
            font-size: 12px;
        }

        .user-role {
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }

        .content {
            padding: 32px 35px;
            max-width: 1600px;
            margin: auto;
        }

        .welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .welcome h1 {
            font-size: 24px;
            letter-spacing: -.8px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: var(--muted);
            font-size: 13px;
        }

        .date-label {
            background: white;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 11px 15px;
            font-size: 12px;
            color: #777;
        }

        .alert-success {
            background: #eaf8ef;
            color: #237a42;
            border: 1px solid #d1eedb;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 22px;
            font-size: 13px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 21px;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .stat-icon {
            width: 39px;
            height: 39px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .purple { background: #f6eafa; color: #7F0079; }
        .green { background: #e8f7ee; color: #20965a; }
        .orange { background: #fff2e5; color: #dc872b; }
        .blue { background: #e9f1ff; color: #477bce; }

        .stat-label {
            color: var(--muted);
            font-size: 12px;
            font-weight: 500;
        }

        .stat-value {
            font-size: 27px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .stat-description {
            color: #aaa;
            font-size: 11px;
            margin-top: 6px;
        }

        .section-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 18px;
        }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 23px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .panel-title {
            font-size: 14px;
            font-weight: 700;
        }

        .panel-subtitle {
            font-size: 11px;
            color: var(--muted);
            margin-top: 5px;
        }

        .quick-links {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .quick-link {
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 16px;
            transition: .2s;
        }

        .quick-link:hover {
            border-color: var(--primary);
            background: #fdf9fd;
        }

        .quick-link i {
            font-size: 21px;
            color: var(--primary);
        }

        .quick-link h4 {
            font-size: 12px;
            margin-top: 13px;
            margin-bottom: 5px;
        }

        .quick-link p {
            font-size: 11px;
            color: var(--muted);
        }

        .activity {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px solid #f2eff2;
        }

        .activity:last-child {
            border-bottom: 0;
        }

        .activity-icon {
            width: 34px;
            height: 34px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .activity h4 {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .activity p {
            font-size: 11px;
            color: var(--muted);
        }

        .footer {
            padding: 25px 35px;
            color: #aaa;
            font-size: 11px;
        }

        .logout-button {
            width: 100%;
            border: 0;
            background: transparent;
            text-align: left;
            cursor: pointer;
            font-family: inherit;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            margin-right: 12px;
        }

        @media(max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: .25s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 0 17px;
            }

            .mobile-toggle {
                display: block;
            }

            .content {
                padding: 25px 17px;
            }

            .welcome {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .stats {
                gap: 10px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-value {
                font-size: 23px;
            }

            .section-grid {
                grid-template-columns: 1fr;
            }

            .user-details {
                display: none;
            }

            .footer {
                padding: 20px 17px;
            }
        }

        @media(max-width: 380px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .quick-links {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">

        <a href="{{ route('admin.dashboard') }}" class="brand">
            <div class="brand-icon">T</div>
            <div class="brand-name">tring<span>.</span></div>
        </a>

        <div class="menu-label">Overview</div>

        <nav class="menu">
            <a href="{{ route('admin.dashboard') }}" class="active">
                <i class="bi bi-grid"></i>
                Dashboard
            </a>
        </nav>

        <div class="menu-label">Content Management</div>

        <nav class="menu">
            <a href="{{ route('admin.articles.index') }}"
   class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
    <i class="bi bi-newspaper"></i>
    Artikel / Berita
</a>

           <a href="{{ route('admin.pages.index') }}"
   class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">

    <i class="bi bi-file-earmark-text"></i>
    <span>Halaman</span>

</a>

            <a href="{{ url('/admin/categories') }}">
                <i class="bi bi-folder2"></i>
                Kategori
            </a>

            <a href="{{ url('/admin/media') }}">
                <i class="bi bi-images"></i>
                Media Library
            </a>
        </nav>

        <div class="menu-label">Website Management</div>

        <nav class="menu">
            <a href="{{ url('/admin/users') }}">
                <i class="bi bi-people"></i>
                Pengguna
            </a>

            <a href="{{ url('/admin/menus') }}">
                <i class="bi bi-list"></i>
                Menu Navigasi
            </a>

            <a href="{{ url('/admin/seo') }}">
                <i class="bi bi-search"></i>
                Pengaturan SEO
            </a>

            <a href="{{ url('/admin/settings') }}">
                <i class="bi bi-gear"></i>
                Pengaturan
            </a>
        </nav>

        <div class="sidebar-bottom">
            <nav class="menu">
                <a href="{{ url('/') }}" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i>
                    Lihat Website
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="menu logout-button">
                        <a>
                            <i class="bi bi-box-arrow-left"></i>
                            Logout
                        </a>
                    </button>
                </form>
            </nav>
        </div>

    </aside>

    {{-- MAIN CONTENT --}}
    <main class="main">

        <header class="topbar">

            <div style="display:flex;align-items:center;">
                <button class="mobile-toggle" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>

                <div class="page-title">Dashboard</div>
            </div>

            <div class="topbar-right">

                <div class="notification">
                    <i class="bi bi-bell"></i>
                </div>

                <div class="user-info">
                    <div class="avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="user-details">
                        <div class="user-name">
                            {{ auth()->user()->name }}
                        </div>

                        <div class="user-role">Administrator</div>
                    </div>
                </div>

            </div>

        </header>

        <div class="content">

            @if(session('success'))
                <div class="alert-success">
                    <i class="bi bi-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- WELCOME --}}
            <section class="welcome">

                <div>
                    <h1>
                        Selamat datang, {{ auth()->user()->name }}!
                    </h1>

                    <p>
                        Berikut ringkasan aktivitas dan pengelolaan website Tring.
                    </p>
                </div>

                <div class="date-label">
                    <i class="bi bi-calendar3"></i>
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>

            </section>

            {{-- STATISTICS --}}
            <section class="stats">

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Total Artikel</span>
                        <div class="stat-icon purple">
                            <i class="bi bi-newspaper"></i>
                        </div>
                    </div>

                    <div class="stat-value">
                        {{ number_format($stats['articles']) }}
                    </div>

                    <div class="stat-description">
                        Seluruh artikel dalam CMS
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Artikel Terbit</span>
                        <div class="stat-icon green">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>

                    <div class="stat-value">
                        {{ number_format($stats['published_articles']) }}
                    </div>

                    <div class="stat-description">
                        Artikel yang sudah dipublikasikan
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Halaman Website</span>
                        <div class="stat-icon orange">
                            <i class="bi bi-file-earmark"></i>
                        </div>
                    </div>

                    <div class="stat-value">
                        {{ number_format($stats['pages']) }}
                    </div>

                    <div class="stat-description">
                        Total halaman website
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-label">Pengguna</span>
                        <div class="stat-icon blue">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>

                    <div class="stat-value">
                        {{ number_format($stats['users']) }}
                    </div>

                    <div class="stat-description">
                        Total akun pengguna
                    </div>
                </div>

            </section>

            {{-- CONTENT GRID --}}
            <section class="section-grid">

                <div class="panel">

                    <div class="panel-header">
                        <div>
                            <div class="panel-title">Akses Cepat</div>
                            <div class="panel-subtitle">
                                Kelola konten website dengan mudah.
                            </div>
                        </div>
                    </div>

                    <div class="quick-links">

                        <a href="{{ url('/admin/articles/create') }}" class="quick-link">
                            <i class="bi bi-plus-square"></i>
                            <h4>Buat Artikel</h4>
                            <p>Publikasikan berita atau artikel baru.</p>
                        </a>

                        <a href="{{ url('/admin/pages/create') }}" class="quick-link">
                            <i class="bi bi-file-earmark-plus"></i>
                            <h4>Buat Halaman</h4>
                            <p>Tambahkan halaman website.</p>
                        </a>

                        <a href="{{ url('/admin/media') }}" class="quick-link">
                            <i class="bi bi-cloud-arrow-up"></i>
                            <h4>Upload Media</h4>
                            <p>Kelola gambar dan file website.</p>
                        </a>

                        <a href="{{ url('/admin/seo') }}" class="quick-link">
                            <i class="bi bi-graph-up"></i>
                            <h4>Pengaturan SEO</h4>
                            <p>Optimalkan pencarian website.</p>
                        </a>

                    </div>

                </div>

                <div class="panel">

                    <div class="panel-header">
                        <div>
                            <div class="panel-title">Informasi CMS</div>
                            <div class="panel-subtitle">
                                Informasi sistem pengelolaan website.
                            </div>
                        </div>
                    </div>

                    <div class="activity">
                        <div class="activity-icon">
                            <i class="bi bi-globe"></i>
                        </div>

                        <div>
                            <h4>Website Tring</h4>
                            <p>tring.id</p>
                        </div>
                    </div>

                    <div class="activity">
                        <div class="activity-icon">
                            <i class="bi bi-person-circle"></i>
                        </div>

                        <div>
                            <h4>Login sebagai</h4>
                            <p>{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="activity">
                        <div class="activity-icon">
                            <i class="bi bi-folder"></i>
                        </div>

                        <div>
                            <h4>Total Kategori</h4>
                            <p>{{ number_format($stats['categories']) }} kategori tersedia</p>
                        </div>
                    </div>

                    <div class="activity">
                        <div class="activity-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <div>
                            <h4>Status Sistem</h4>
                            <p>CMS aktif dan siap digunakan</p>
                        </div>
                    </div>

                </div>

            </section>

        </div>

        <footer class="footer">
            &copy; {{ date('Y') }} Tring CMS. All rights reserved.
        </footer>

    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
        }
    </script>

</body>
</html>
