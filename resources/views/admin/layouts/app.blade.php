
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Tring CMS')</title>

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

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Inter, sans-serif;
            background: var(--background);
            color: var(--text);
            font-size: 14px;
        }

        a { text-decoration: none; color: inherit; }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            inset: 0 auto 0 0;
            background: white;
            border-right: 1px solid var(--border);
            padding: 25px 17px;
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto;
            transition: .25s;
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
            display: grid;
            place-items: center;
            font-size: 21px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 21px;
            font-weight: 800;
        }

        .brand-name span { color: var(--primary); }

        .menu-label {
            font-size: 10px;
            font-weight: 700;
            color: #aaa3aa;
            letter-spacing: 1px;
            padding: 0 12px;
            margin: 20px 0 10px;
            text-transform: uppercase;
        }

        .menu { display: flex; flex-direction: column; gap: 5px; }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 11px 13px;
            border-radius: 8px;
            color: #716b71;
            font-size: 13px;
            font-weight: 500;
        }

        .menu a i { font-size: 17px; }

        .menu a:hover, .menu a.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid var(--border);
            padding-top: 16px;
        }

        .main { margin-left: var(--sidebar-width); min-height: 100vh; }

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .page-title { font-size: 17px; font-weight: 700; }

        .topbar-right, .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 37px;
            height: 37px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: grid;
            place-items: center;
            font-weight: 700;
        }

        .user-name { font-weight: 600; font-size: 12px; }
        .user-role { color: var(--muted); font-size: 11px; margin-top: 3px; }

        .content {
            padding: 32px 35px;
            max-width: 1600px;
            margin: auto;
        }

        .footer { padding: 25px 35px; color: #aaa; font-size: 11px; }

        .mobile-toggle {
            display: none;
            border: 0;
            background: none;
            font-size: 23px;
            cursor: pointer;
            margin-right: 12px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #eaf8ef;
            color: #237a42;
            border: 1px solid #d1eedb;
        }

        .alert-danger {
            background: #fff0f0;
            color: #b42318;
            border: 1px solid #f5cccc;
        }

        @media(max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main { margin-left: 0; }
            .topbar { padding: 0 17px; }
            .mobile-toggle { display: block; }
            .content { padding: 25px 17px; }
            .footer { padding: 20px 17px; }
            .user-details { display: none; }
        }
    </style>

    @stack('styles')
</head>
<body>

<aside class="sidebar" id="sidebar">

    <a href="{{ route('admin.dashboard') }}" class="brand">
        <div class="brand-icon">T</div>
        <div class="brand-name">tring<span>.</span></div>
    </a>

    <div class="menu-label">Overview</div>

    <nav class="menu">
        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid"></i> Dashboard
        </a>
    </nav>

    <div class="menu-label">Content Management</div>

    <nav class="menu">
        <a href="{{ route('admin.articles.index') }}"
           class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
            <i class="bi bi-newspaper"></i> Artikel / Berita
        </a>

        <a href="{{ url('/admin/pages') }}">
            <i class="bi bi-file-earmark-text"></i> Halaman
        </a>

        <a href="{{ url('/admin/categories') }}">
            <i class="bi bi-folder2"></i> Kategori
        </a>

        <a href="{{ url('/admin/media') }}">
            <i class="bi bi-images"></i> Media Library
        </a>
    </nav>

    <div class="menu-label">Website Management</div>

    <nav class="menu">
        <a href="{{ url('/admin/users') }}">
            <i class="bi bi-people"></i> Pengguna
        </a>

        <a href="{{ url('/admin/menus') }}">
            <i class="bi bi-list"></i> Menu Navigasi
        </a>

        <a href="{{ url('/admin/seo') }}">
            <i class="bi bi-search"></i> Pengaturan SEO
        </a>

        <a href="{{ url('/admin/settings') }}">
            <i class="bi bi-gear"></i> Pengaturan
        </a>
    </nav>

    <div class="sidebar-bottom">
        <nav class="menu">
            <a href="{{ url('/') }}" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i> Lihat Website
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    style="width:100%;border:0;background:none;text-align:left;font:inherit;cursor:pointer;">
                    <span style="display:flex;align-items:center;gap:13px;padding:11px 13px;color:#716b71;">
                        <i class="bi bi-box-arrow-left"></i> Logout
                    </span>
                </button>
            </form>
        </nav>
    </div>

</aside>

<main class="main">

    <header class="topbar">
        <div style="display:flex;align-items:center;">
            <button class="mobile-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>

            <div class="page-title">@yield('page-title', 'Dashboard')</div>
        </div>

        <div class="topbar-right">
            <div class="user-info">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="user-details">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-role">Administrator</div>
                </div>
            </div>
        </div>
    </header>

    <div class="content">

        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

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

@stack('scripts')

</body>
</html>
