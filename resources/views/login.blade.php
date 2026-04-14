<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Masuk | SPK SMART</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            font-family: 'Poppins', sans-serif;
            --bg: #ecf2ff;
            --surface: #ffffff;
            --surface-strong: #f8fbff;
            --text: #11243d;
            --muted: #5e6c84;
            --accent: #2563eb;
            --accent-dark: #1d4ed8;
            --border: rgba(15, 23, 42, 0.08);
            --shadow: 0 24px 50px rgba(15, 23, 42, 0.08);
        }

        * {box-sizing: border-box;}
        html, body {margin: 0; min-height: 100%;}
        body {
            background: radial-gradient(circle at top, rgba(37,99,235,0.16), transparent 28%),
                        linear-gradient(180deg, #f8fbff 0%, #eef4ff 100%);
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .login-shell {
            width: 100%;
            max-width: 1080px;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 32px;
        }

        .login-panel,
        .login-form-wrap {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 28px;
            box-shadow: var(--shadow);
            padding: 40px;
        }

        .login-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 18px;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: #ffffff;
            overflow: hidden;
        }

        .login-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top left, rgba(255,255,255,0.22), transparent 30%);
            pointer-events: none;
            z-index: 0;
        }

        .login-panel > * {position: relative; z-index: 1;}

        .brand-mark {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            background: rgba(255,255,255,0.16);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            letter-spacing: 0.08em;
            color: #ffffff;
        }

        .login-panel h1 {
            margin: 0;
            font-size: 2.4rem;
            line-height: 1.05;
            letter-spacing: -0.03em;
        }

        .login-panel p {
            margin: 0;
            max-width: 340px;
            font-size: 1rem;
            color: rgba(255,255,255,0.88);
            line-height: 1.7;
        }

        .login-panel .detail {
            margin-top: 16px;
            font-size: 0.95rem;
            color: rgba(255,255,255,0.82);
        }

        .login-form-wrap {
            position: relative;
            min-height: 420px;
        }

        .login-form-wrap h2 {
            margin: 0 0 10px;
            font-size: 1.9rem;
            letter-spacing: -0.02em;
        }

        .login-form-wrap p {
            margin: 0 0 24px;
            color: var(--muted);
            line-height: 1.7;
        }

        .alert {
            border-radius: 14px;
            border: 1px solid #f5c2c7;
            background: #fff1f2;
            color: #842029;
            padding: 14px 16px;
            margin-bottom: 20px;
        }

        .alert.success {
            border-color: #badbcc;
            background: #d1e7dd;
            color: #0f5132;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #24303f;
        }

        input {
            width: 100%;
            border-radius: 14px;
            border: 1px solid #d8e3f3;
            padding: 14px 16px;
            font-size: 1rem;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease;
            background: #fafbff;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 8px 24px rgba(37,99,235,0.12);
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 6px;
        }

        .form-footer .remember {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.92rem;
            color: var(--muted);
        }

        .form-footer a {
            color: var(--accent);
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 14px 16px;
            background: var(--accent);
            color: #ffffff;
            font-weight: 700;
            cursor: pointer;
            transition: transform .15s ease, background .15s ease;
            font-size: 1rem;
        }

        button:hover {
            background: var(--accent-dark);
            transform: translateY(-1px);
        }

        .footer-text {
            margin-top: 22px;
            font-size: 0.92rem;
            color: var(--muted);
            text-align: center;
        }

        @media (max-width: 900px) {
            .login-shell {grid-template-columns: 1fr;}
        }

        @media (max-width: 560px) {
            .login-panel,
            .login-form-wrap {padding: 26px;}
            .login-panel h1 {font-size: 2rem;}
        }
    </style>
</head>
<body>
    <div class="login-shell">
        <section class="login-panel">
            <span class="brand-mark">SPK</span>
            <h1>Selamat datang kembali!</h1>
            <p>Masukkan email dan password Anda untuk mengakses sistem rekomendasi SPK berbasis SMART.</p>
            <p class="detail">Login aman, cepat, dan mudah untuk melanjutkan manajemen data alternatif, kriteria, penilaian, serta laporan.</p>
        </section>

        <section class="login-form-wrap">
            <h2>Login</h2>
            <p>Gunakan akun administrator untuk masuk ke dashboard.</p>

            @if(session('success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert">{{ session('error') }}</div>
            @endif

            <form method="post" action="{{ url('/login') }}">
                @csrf
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required autocomplete="email" autofocus>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Masukkan password" required autocomplete="current-password">
                </div>

                <div class="form-footer">
                    <label class="remember">
                        <input type="checkbox" name="remember" style="width:16px; height:16px; border-radius:4px;"> Ingat saya
                    </label>
                    <a href="{{ url('/forgot-password') }}">Lupa password?</a>
                </div>

                <button type="submit">Masuk</button>
            </form>

            <p class="footer-text">Belum punya akun? <a href="{{ url('/register') }}">Daftar di sini</a></p>
        </section>
    </div>
</body>
</html>
