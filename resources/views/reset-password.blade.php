<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Reset Password | SPK SMART</title>
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

        .reset-shell {
            width: 100%;
            max-width: 500px;
        }

        .reset-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 28px;
            box-shadow: var(--shadow);
            padding: 40px;
        }

        .reset-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand-mark {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            background: #10b981;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            letter-spacing: 0.08em;
            color: #ffffff;
            margin-bottom: 16px;
        }

        .reset-card h1 {
            margin: 0 0 8px;
            font-size: 1.8rem;
            letter-spacing: -0.02em;
        }

        .reset-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.6;
            font-size: 0.95rem;
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

        .password-info {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 14px;
            padding: 12px 14px;
            font-size: 0.85rem;
            color: #166534;
            margin-top: 24px;
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
            margin-top: 8px;
        }

        button:hover {
            background: var(--accent-dark);
            transform: translateY(-1px);
        }

        .footer-link {
            text-align: center;
            margin-top: 20px;
        }

        .footer-link a {
            color: var(--accent);
            text-decoration: none;
            font-size: 0.95rem;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 560px) {
            .reset-card {padding: 26px;}
            .reset-card h1 {font-size: 1.4rem;}
        }
    </style>
</head>
<body>
    <div class="reset-shell">
        <div class="reset-card">
            <div class="reset-header">
                <span class="brand-mark">✓</span>
                <h1>Set Password Baru</h1>
                <p>Masukkan password baru Anda untuk akun administrator</p>
            </div>

            @if(session('error'))
                <div class="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form method="post" action="{{ url('/reset-password') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="field">
                    <label for="password">Password Baru</label>
                    <input id="password" type="password" name="password" placeholder="Masukkan password baru" required autocomplete="new-password" minlength="6">
                </div>

                <div class="field">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi password baru" required autocomplete="new-password" minlength="6">
                </div>

                <div class="password-info">
                    <strong>Persyaratan password:</strong>
                    <ul style="margin: 8px 0 0 0; padding-left: 20px;">
                        <li>Minimal 6 karakter</li>
                        <li>Harus cocok dengan konfirmasi password</li>
                    </ul>
                </div>

                <button type="submit">Reset Password</button>
            </form>

            <div class="footer-link">
                <a href="{{ url('/login') }}">← Kembali ke login</a>
            </div>
        </div>
    </div>
</body>
</html>
