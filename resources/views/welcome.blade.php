<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UPN Veteran Jakarta</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root{--accent:#1758E8;--accent-dark:#003ecb}
        html,body{height:100%;}
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: url("{{ asset('upn_veteran_jakarta.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
        }

        /* center container */
        .overlay {
            min-height: 100%;
            width: 100%;
            background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45));
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255,255,255,0.98);
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(2,6,23,0.45);
            animation: fadeIn 0.9s ease-in-out;
            border: 1px solid rgba(0,0,0,0.06);
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(14px);} 
            to {opacity: 1; transform: translateY(0);} 
        }

        h2 {
            text-align: center;
            margin: 4px 0 20px 0;
            font-size: 22px;
            font-weight: 700;
            color: #0f1724;
        }

        .muted {color:#556; font-size:13px; text-align:center; margin-bottom:18px}

        label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #222;
            font-size: 13px;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 14px;
            border-radius: 10px;
            border: 1px solid #d6dbe3;
            font-size: 15px;
            outline: none;
            transition: box-shadow .15s, border-color .15s;
        }

        input:focus{box-shadow:0 6px 18px rgba(23,88,232,0.08); border-color:var(--accent)}

        .actions {display:flex; gap:12px; align-items:center}
        .actions .remember {font-size:13px; color:#444}

        button {
            flex:1;
            padding: 12px 14px;
            background: var(--accent);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: background .18s ease, transform .08s ease;
            font-weight: 700;
        }

        button:hover {background:var(--accent-dark); transform:translateY(-1px)}

        .help {font-size:13px; margin-top:12px; color:#444; text-align:center}

        @media (max-width:480px){
            .login-card{padding:20px; border-radius:10px}
            h2{font-size:20px}
        }
    </style>
</head>

<body>
    <div class="overlay">
        <div class="login-card">
            <h2>Login</h2>

            <form action="/login" method="POST">
                @csrf

                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email Anda" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>

                <button type="submit">Login</button>
            </form>

        </div>
    </div>
</body>
</html>
