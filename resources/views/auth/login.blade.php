<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>Tring.id - Login</title>

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
        href="https://fonts.gstatic.com"
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

        /* =========================================================
           ROOT
        ========================================================= */

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

            --success: #15803D;
            --success-bg: #F0FDF4;
            --success-border: #BBF7D0;

            --danger: #B91C1C;
            --danger-bg: #FEF2F2;
            --danger-border: #FECACA;

        }


        /* =========================================================
           RESET
        ========================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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


        /* =========================================================
           WRAPPER
        ========================================================= */

        .login-wrapper {

            min-height: 100vh;

            display: flex;

            background: var(--white);

        }


        /* =========================================================
           LEFT SIDE
        ========================================================= */

        .login-left {

            width: 50%;

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 80% 20%,
                    rgba(255,255,255,.10),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 15% 85%,
                    rgba(255,255,255,.07),
                    transparent 30%
                ),
                var(--primary);

            color: var(--white);

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 60px;

            position: relative;

            overflow: hidden;

        }


        /* Decorative Circle */

        .login-left::before {

            content: "";

            position: absolute;

            width: 520px;
            height: 520px;

            border-radius: 50%;

            border:
                1px solid
                rgba(255,255,255,.10);

            top: -220px;
            left: -200px;

            pointer-events: none;

        }


        .login-left::after {

            content: "";

            position: absolute;

            width: 620px;
            height: 620px;

            border-radius: 50%;

            border:
                1px solid
                rgba(255,255,255,.08);

            right: -330px;
            bottom: -330px;

            pointer-events: none;

        }


        /* =========================================================
           BRAND CONTENT
        ========================================================= */

        .brand-content {

            width: 100%;

            max-width: 520px;

            position: relative;

            z-index: 2;

        }


        .brand-logo {

            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 48px;

        }


        .brand-logo img {

            width: 46px;
            height: 46px;

            object-fit: contain;

            border-radius: 12px;


        }


        .brand-logo span {

            font-size: 24px;

            font-weight: 800;

            letter-spacing: -.7px;

        }


        /* =========================================================
           EYEBROW
        ========================================================= */

        .eyebrow {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 18px;

            font-size: 10px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 1.3px;

            color:
                rgba(255,255,255,.60);

        }


        .eyebrow::before {

            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #fff;

            box-shadow:
                0 0 0 4px
                rgba(255,255,255,.10);

        }


        /* =========================================================
           LEFT HEADING
        ========================================================= */

        .brand-content h1 {

            max-width: 500px;

            font-size: clamp(40px, 4vw, 58px);

            line-height: 1.04;

            letter-spacing: -2.8px;

            font-weight: 800;

            margin-bottom: 22px;

        }


        .brand-content > p {

            max-width: 450px;

            color:
                rgba(255,255,255,.66);

            font-size: 14px;

            line-height: 1.8;

        }


        /* =========================================================
           FEATURES
        ========================================================= */

        .feature-list {

            margin-top: 38px;

            display: flex;

            flex-direction: column;

            gap: 15px;

        }


        .feature-item {

            display: flex;

            align-items: center;

            gap: 13px;

            color:
                rgba(255,255,255,.78);

            font-size: 12px;

        }


        .feature-icon {

            width: 35px;
            height: 35px;

            flex: 0 0 35px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 10px;

            background:
                rgba(255,255,255,.08);

            border:
                1px solid
                rgba(255,255,255,.13);

            color: #fff;

            font-size: 14px;

        }


        /* =========================================================
           RIGHT SIDE
        ========================================================= */

        .login-right {

            width: 50%;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 50px 60px;

            background: #fff;

        }


        .login-container {

            width: 100%;

            max-width: 420px;

        }


        /* =========================================================
           MOBILE LOGO
        ========================================================= */

        .mobile-logo {

            display: none;

            align-items: center;

            gap: 10px;

            margin-bottom: 35px;

        }


        .mobile-logo img {

            width: 40px;
            height: 40px;

            object-fit: contain;

            border-radius: 10px;

            background: var(--primary-light);

        }


        .mobile-logo span {

            color: var(--primary);

            font-size: 21px;

            font-weight: 800;

            letter-spacing: -.5px;

        }


        /* =========================================================
           LOGIN HEADER
        ========================================================= */

        .login-header {

            margin-bottom: 30px;

        }


        .login-header h2 {

            font-size: 30px;

            font-weight: 800;

            letter-spacing: -1.2px;

            color: var(--black);

            margin-bottom: 9px;

        }


        .login-header p {

            font-size: 13px;

            color: var(--gray-2);

            line-height: 1.6;

        }


        /* =========================================================
           ALERT
        ========================================================= */

        .alert {

            padding: 13px 15px;

            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 12px;

            display: flex;

            align-items: flex-start;

            gap: 10px;

        }


        .alert i {

            font-size: 15px;

            margin-top: 1px;

            flex: 0 0 auto;

        }


        .alert-danger {

            background: var(--danger-bg);

            color: var(--danger);

            border:
                1px solid
                var(--danger-border);

        }


        .alert-success {

            background: var(--success-bg);

            color: var(--success);

            border:
                1px solid
                var(--success-border);

        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-group {

            margin-bottom: 19px;

        }


        .form-label {

            display: block;

            font-size: 12px;

            font-weight: 700;

            color: #374151;

            margin-bottom: 8px;

        }


        .input-wrapper {

            position: relative;

        }


        .input-icon {

            position: absolute;

            left: 14px;

            top: 50%;

            transform: translateY(-50%);

            color: #A3A3A3;

            font-size: 16px;

            pointer-events: none;

            transition: .2s;

        }


        .form-control {

            width: 100%;

            height: 50px;

            border:
                1px solid
                var(--border);

            border-radius: 10px;

            padding:
                0
                45px
                0
                43px;

            font-family: inherit;

            font-size: 13px;

            color: var(--black);

            background: #fff;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease;

        }


        .form-control::placeholder {

            color: #A3A3A3;

        }


        .form-control:focus {

            border-color: var(--primary);

            box-shadow:
                0 0 0 3px
                rgba(127,0,121,.08);

        }


        .input-wrapper:focus-within .input-icon {

            color: var(--primary);

        }


        /* =========================================================
           PASSWORD TOGGLE
        ========================================================= */

        .password-toggle {

            position: absolute;

            right: 13px;

            top: 50%;

            transform: translateY(-50%);

            width: 30px;
            height: 30px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 0;

            background: transparent;

            color: #A3A3A3;

            cursor: pointer;

            font-size: 16px;

            border-radius: 7px;

            transition: .2s;

        }


        .password-toggle:hover {

            color: var(--primary);

            background:
                var(--primary-light);

        }


        /* =========================================================
           OPTIONS
        ========================================================= */

        .form-options {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin:
                5px 0
                25px;

        }


        .remember {

            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 12px;

            color: var(--gray-2);

            cursor: pointer;

        }


        .remember input {

            width: 15px;
            height: 15px;

            accent-color: var(--primary);

            cursor: pointer;

        }


        .forgot-link {

            color: var(--primary);

            font-size: 12px;

            font-weight: 700;

            text-decoration: none;

        }


        .forgot-link:hover {

            color: var(--primary-dark);

            text-decoration: underline;

        }


        /* =========================================================
           LOGIN BUTTON
        ========================================================= */

        .btn-login {

            width: 100%;

            height: 50px;

            border: none;

            border-radius: 10px;

            background: var(--primary);

            color: #fff;

            font-family: inherit;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            transition:
                background .2s ease,
                transform .2s ease,
                box-shadow .2s ease;

        }


        .btn-login:hover {

            background: var(--primary-dark);

            transform: translateY(-1px);

            box-shadow:
                0 10px 24px
                rgba(127,0,121,.20);

        }


        .btn-login:active {

            transform: translateY(0);

        }


        /* =========================================================
           REGISTER
        ========================================================= */

        .register-text {

            text-align: center;

            margin-top: 26px;

            font-size: 12px;

            color: var(--gray-2);

        }


        .register-text a {

            color: var(--primary);

            font-weight: 700;

            text-decoration: none;

        }


        .register-text a:hover {

            color: var(--primary-dark);

            text-decoration: underline;

        }


        /* =========================================================
           COPYRIGHT
        ========================================================= */

        .copyright {

            text-align: center;

            color: #A3A3A3;

            font-size: 10px;

            margin-top: 32px;

        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 900px) {

            .login-left {

                display: none;

            }


            .login-right {

                width: 100%;

                min-height: 100vh;

                padding:
                    40px
                    24px;

                background:
                    linear-gradient(
                        180deg,
                        var(--primary-light) 0,
                        #fff 190px
                    );

            }


            .mobile-logo {

                display: flex;

            }


            .login-container {

                max-width: 430px;

            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 480px) {

            .login-right {

                padding:
                    28px
                    18px;

                align-items: flex-start;

            }


            .login-container {

                padding-top: 5px;

            }


            .mobile-logo {

                margin-bottom: 30px;

            }


            .login-header {

                margin-bottom: 25px;

            }


            .login-header h2 {

                font-size: 26px;

                letter-spacing: -1px;

            }


            .login-header p {

                font-size: 12px;

            }


            .form-control {

                height: 49px;

            }


            .btn-login {

                height: 49px;

            }

        }

    </style>

</head>


<body>

<div class="login-wrapper">


    {{-- =====================================================
         LEFT
    ====================================================== --}}

    <div class="login-left">

        <div class="brand-content">


            {{-- LOGO --}}

            <div class="brand-logo">

            <img
    src="{{ asset('tr.png') }}"
    alt="Tring.id"
>

                <span>
                    Tring.id
                </span>

            </div>



            {{-- HEADING --}}

            <h1>

                Semua kebutuhan

                digital dalam satu

                tempat.

            </h1>


            

            {{-- FEATURES --}}

            <div class="feature-list">


                <div class="feature-item">

                    <div class="feature-icon">

                        <i class="bi bi-lightning-charge"></i>

                    </div>

                    <span>
                        Proses cepat dan praktis
                    </span>

                </div>


                <div class="feature-item">

                    <div class="feature-icon">

                        <i class="bi bi-shield-check"></i>

                    </div>

                    <span>
                        Transaksi aman dan terpercaya
                    </span>

                </div>


                <div class="feature-item">

                    <div class="feature-icon">

                        <i class="bi bi-grid"></i>

                    </div>

                    <span>
                        Berbagai layanan digital tersedia
                    </span>

                </div>


            </div>

        </div>

    </div>


    {{-- =====================================================
         RIGHT
    ====================================================== --}}

    <div class="login-right">

        <div class="login-container">


            {{-- MOBILE LOGO --}}

            <div class="mobile-logo">

                <img
                    src="{{ asset('logo.png') }}"
                    alt="Tring.id"
                >

                <span>
                    Tring.id
                </span>

            </div>


            {{-- HEADER --}}

            <div class="login-header">

                <h2>
                    Selamat datang kembali
                </h2>

                <p>
                    Masuk ke akun Anda untuk melanjutkan.
                </p>

            </div>


            {{-- SESSION STATUS --}}

            @if (session('status'))

                <div class="alert alert-success">

                    <i class="bi bi-check-circle"></i>

                    <span>
                        {{ session('status') }}
                    </span>

                </div>

            @endif


            {{-- VALIDATION ERROR --}}

            @if ($errors->any())

                <div class="alert alert-danger">

                    <i class="bi bi-exclamation-circle"></i>

                    <div>
                        {{ $errors->first() }}
                    </div>

                </div>

            @endif


            {{-- LOGIN FORM --}}

            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


                {{-- EMAIL --}}

                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            autocomplete="email"
                            required
                            autofocus
                        >

                    </div>

                </div>


                {{-- PASSWORD --}}

                <div class="form-group">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                        >

                            <i class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>


                {{-- OPTIONS --}}

                <div class="form-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            {{ old('remember') ? 'checked' : '' }}
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>

                <div
                        class="cf-turnstile"
                        data-sitekey="{{ config('services.turnstile.site_key') }}">
                    </div>
                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-link"
                        >
                            Lupa password?
                        </a>

                    @endif

                </div>


                {{-- SUBMIT --}}

                <button
                    type="submit"
                    class="btn-login"
                >
                    Masuk
                </button>

            </form>


            {{-- REGISTER --}}

            @if (Route::has('register'))

                <div class="register-text">

                    Belum memiliki akun?

                    <a href="{{ route('register') }}">
                        Daftar sekarang
                    </a>

                </div>

            @endif


            {{-- COPYRIGHT --}}

            <div class="copyright">

                © {{ date('Y') }} Tring.id. All rights reserved.

            </div>

        </div>

    </div>

</div>


<script>

    const togglePassword =
        document.getElementById('togglePassword');

    const password =
        document.getElementById('password');


    if (togglePassword && password) {

        togglePassword.addEventListener(
            'click',
            function () {

                const type =
                    password.getAttribute('type') === 'password'
                        ? 'text'
                        : 'password';

                password.setAttribute(
                    'type',
                    type
                );


                const icon =
                    this.querySelector('i');


                if (type === 'text') {

                    icon.classList.remove(
                        'bi-eye'
                    );

                    icon.classList.add(
                        'bi-eye-slash'
                    );

                } else {

                    icon.classList.remove(
                        'bi-eye-slash'
                    );

                    icon.classList.add(
                        'bi-eye'
                    );

                }

            }
        );

    }

</script>


</body>

</html>

