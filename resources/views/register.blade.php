<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar | SPK SMART</title>
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

        .register-shell {
            width: 100%;
            max-width: 1080px;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 32px;
        }

        .register-panel,
        .register-form-wrap {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 28px;
            box-shadow: var(--shadow);
            padding: 40px;
        }

        .register-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 18px;
            background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
            color: #ffffff;
            overflow: hidden;
            position: relative;
        }

        .register-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top left, rgba(255,255,255,0.22), transparent 30%);
            pointer-events: none;
            z-index: 0;
        }

        .register-panel > * {position: relative; z-index: 1;}

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

        .register-panel h1 {
            margin: 0;
            font-size: 2.4rem;
            line-height: 1.05;
            letter-spacing: -0.03em;
        }

        .register-panel p {
            margin: 0;
            max-width: 340px;
            font-size: 1rem;
            color: rgba(255,255,255,0.88);
            line-height: 1.7;
        }

        .register-panel .detail {
            margin-top: 16px;
            font-size: 0.95rem;
            color: rgba(255,255,255,0.82);
        }

        .register-form-wrap {
            position: relative;
            min-height: auto;
        }

        .register-form-wrap h2 {
            margin: 0 0 10px;
            font-size: 1.9rem;
            letter-spacing: -0.02em;
        }

        .register-form-wrap p {
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
            font-size: 0.9rem;
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

        button {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 14px 16px;
            background: #10b981;
            color: #ffffff;
            font-weight: 700;
            cursor: pointer;
            transition: transform .15s ease, background .15s ease;
            font-size: 1rem;
            margin-top: 8px;
        }

        button:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        .footer-text {
            margin-top: 22px;
            font-size: 0.92rem;
            color: var(--muted);
            text-align: center;
        }

        .footer-text a {
            color: var(--accent);
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .register-shell {grid-template-columns: 1fr;}
        }

        @media (max-width: 560px) {
            .register-panel,
            .register-form-wrap {padding: 26px;}
            .register-panel h1 {font-size: 2rem;}
        }
    </style>
</head>
<body>
    <div class="register-shell">
        <section class="register-panel">
            <span class="brand-mark">SPK</span>
            <h1>Bergabunglah bersama kami!</h1>
            <p>Buat akun baru untuk mengakses sistem rekomendasi SPK berbasis SMART.</p>
            <p class="detail">Daftar sekarang dan mulai manajemen data alternatif, kriteria, penilaian, serta laporan dengan mudah.</p>
        </section>

        <section class="register-form-wrap">
            <h2>Daftar</h2>
            <p>Isi form di bawah untuk membuat akun baru Anda.</p>

            @if(session('error'))
                <div class="alert">{{ session('error') }}</div>
            @endif

            <form method="post" action="{{ url('/register') }}">
                @csrf
                <div class="field">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap Anda" required autocomplete="name" autofocus>
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required autocomplete="email">
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Masukkan password (minimum 6 karakter)" required autocomplete="new-password" minlength="6">
                </div>

                <div class="field">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi password Anda" required autocomplete="new-password" minlength="6">
                </div>

                <button type="submit">Daftar Akun</button>
            </form>

            <p class="footer-text">Sudah punya akun? <a href="{{ url('/login') }}">Masuk di sini</a></p>
        </section>
    </div>
</body>
</html>
