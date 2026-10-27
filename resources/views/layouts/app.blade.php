<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#7F0079">
    <meta name="description" content="Tring Pocket Manager, solusi praktis untuk mengelola aktivitas dan keuangan dalam satu aplikasi.">
    <meta name="robots" content="index, follow">

    <title>@yield('title', 'Tring - Pocket Manager')</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('tring.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('tring.png') }}">

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    {{-- CSS halaman --}}
    @stack('styles')
</head>
<body>
    @yield('content')

    {{-- JavaScript halaman jika diperlukan --}}
    @stack('scripts')
</body>
</html>
