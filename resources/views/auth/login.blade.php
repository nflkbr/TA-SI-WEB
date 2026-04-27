<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0a0a0f; --surface: #13131a; --surface2: #1c1c28;
            --border: #2a2a3d; --accent: #6c63ff; --text: #e8e8f0;
            --text-muted: #6b6b8a; --danger: #ff4d6d; --success: #00d68f;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        body::before {
            content: '';
            position: fixed;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(108,99,255,0.12) 0%, transparent 70%);
            top: -100px; left: -100px;
            pointer-events: none;
        }
        .auth-box {
            width: 100%;
            max-width: 400px;
            padding: 1rem;
        }
        .auth-logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        .auth-logo h1 {
            font-family: 'Space Mono', monospace;
            font-size: 1.1rem;
            color: var(--accent);
            letter-spacing: 3px;
        }
        .auth-logo p { color: var(--text-muted); font-size: 0.85rem; margin-top: 0.3rem; }
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
        }
        .form-group { margin-bottom: 1.1rem; }
        label {
            display: block;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 0.4rem;
        }
        input {
            width: 100%;
            padding: 0.75rem 1rem;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text);
            font-size: 0.95rem;
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color 0.2s;
        }
        input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(108,99,255,0.1); }
        .invalid-feedback { color: var(--danger); font-size: 0.8rem; margin-top: 0.3rem; display: block; }
        .btn-submit {
            width: 100%;
            padding: 0.8rem;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            margin-top: 0.5rem;
            transition: background 0.2s, transform 0.1s;
        }
        .btn-submit:hover { background: #5a52e0; transform: translateY(-1px); }
        .auth-footer {
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.85rem;
            color: var(--text-muted);
        }
        .auth-footer a { color: var(--accent); text-decoration: none; }
        .auth-footer a:hover { text-decoration: underline; }
        hr { border: none; border-top: 1px solid var(--border); margin: 1.2rem 0; }
    </style>
</head>
<body>
<div class="auth-box">
    <div class="auth-logo">
        <h1>⚡ E-COMMERCE UTS</h1>
        <p>Masuk ke akun kamu</p>
    </div>
    <div class="card">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="email@contoh.com">
                @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••">
            </div>
            <button type="submit" class="btn-submit">Login →</button>
        </form>
        <hr>
        <div class="auth-footer">Belum punya akun? <a href="{{ route('register') }}">Register</a></div>
    </div>
</div>
</body>
</html>