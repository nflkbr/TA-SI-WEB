<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce UTS</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0a0a0f;
            --surface: #13131a;
            --surface2: #1c1c28;
            --border: #2a2a3d;
            --accent: #6c63ff;
            --accent2: #ff6584;
            --text: #e8e8f0;
            --text-muted: #6b6b8a;
            --success: #00d68f;
            --danger: #ff4d6d;
            --warning: #ffb830;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
        }
        /* NAVBAR */
        nav {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
        }
        .nav-brand {
            font-family: 'Space Mono', monospace;
            font-size: 1rem;
            font-weight: 700;
            color: var(--accent);
            text-decoration: none;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .nav-user {
            font-size: 0.8rem;
            color: var(--text-muted);
            font-family: 'Space Mono', monospace;
        }
        .nav-user span {
            color: var(--accent);
        }
        /* BUTTONS */
        .btn {
            padding: 0.45rem 1.1rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary { background: var(--accent); color: #fff; }
        .btn-primary:hover { background: #5a52e0; transform: translateY(-1px); }
        .btn-danger { background: var(--danger); color: #fff; }
        .btn-danger:hover { background: #e0304d; }
        .btn-warning { background: var(--warning); color: #000; }
        .btn-warning:hover { background: #e0a020; }
        .btn-success { background: var(--success); color: #000; }
        .btn-success:hover { background: #00b87a; }
        .btn-secondary { background: var(--surface2); color: var(--text); border: 1px solid var(--border); }
        .btn-secondary:hover { background: var(--border); }
        .btn-outline { background: transparent; color: var(--accent); border: 1px solid var(--accent); }
        .btn-outline:hover { background: var(--accent); color: #fff; }
        .btn-sm { padding: 0.3rem 0.75rem; font-size: 0.78rem; }
        /* CONTAINER */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        /* ALERTS */
        .alert {
            padding: 0.85rem 1.2rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 3px solid;
        }
        .alert-success { background: rgba(0,214,143,0.1); border-color: var(--success); color: var(--success); }
        .alert-danger { background: rgba(255,77,109,0.1); border-color: var(--danger); color: var(--danger); }
        /* CARD */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }
        .card-header {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid var(--border);
            font-family: 'Space Mono', monospace;
            font-size: 0.9rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .card-header h5 { color: var(--text); font-size: 1rem; }
        .card-body { padding: 1.5rem; }
        /* FORMS */
        .form-group { margin-bottom: 1.2rem; }
        label {
            display: block;
            margin-bottom: 0.4rem;
            font-size: 0.82rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }
        input[type="text"], input[type="email"], input[type="password"],
        input[type="number"], textarea, select {
            width: 100%;
            padding: 0.7rem 1rem;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text);
            font-size: 0.95rem;
            font-family: 'DM Sans', sans-serif;
            transition: border-color 0.2s;
            outline: none;
        }
        input:focus, textarea:focus, select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(108,99,255,0.1);
        }
        textarea { resize: vertical; min-height: 80px; }
        .invalid-feedback { color: var(--danger); font-size: 0.8rem; margin-top: 0.3rem; }
        /* TABLE */
        table { width: 100%; border-collapse: collapse; }
        thead tr { background: var(--surface2); }
        th {
            padding: 0.85rem 1rem;
            text-align: left;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            font-family: 'Space Mono', monospace;
            border-bottom: 1px solid var(--border);
        }
        td {
            padding: 0.85rem 1rem;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
            vertical-align: middle;
        }
        tbody tr:hover { background: rgba(108,99,255,0.04); }
        /* BADGE */
        .badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
            font-size: 0.72rem;
            font-weight: 600;
            margin: 2px;
        }
        .badge-accent { background: rgba(108,99,255,0.2); color: var(--accent); border: 1px solid rgba(108,99,255,0.3); }
        .badge-success { background: rgba(0,214,143,0.15); color: var(--success); }
        /* CHECKBOX */
        .check-group {
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }
        .check-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.4rem 0;
        }
        .check-item input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--accent);
            cursor: pointer;
        }
        .check-item label {
            margin: 0;
            text-transform: none;
            letter-spacing: 0;
            font-size: 0.9rem;
            color: var(--text);
            cursor: pointer;
        }
        /* PAGE HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .page-title {
            font-family: 'Space Mono', monospace;
            font-size: 1.1rem;
            color: var(--text);
        }
        .page-title span { color: var(--accent); }
        /* PRODUCT GRID */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.2rem;
        }
        .product-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.2rem;
            transition: border-color 0.2s, transform 0.2s;
        }
        .product-card:hover { border-color: var(--accent); transform: translateY(-2px); }
        .product-name { font-weight: 600; font-size: 1rem; margin-bottom: 0.4rem; }
        .product-desc { font-size: 0.82rem; color: var(--text-muted); margin-bottom: 0.8rem; line-height: 1.5; }
        .product-price { font-family: 'Space Mono', monospace; color: var(--success); font-size: 1rem; margin-bottom: 0.4rem; }
        .product-stock { font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.8rem; }
        .product-cats { margin-bottom: 1rem; }
        /* FORM ACTIONS */
        .form-actions { display: flex; gap: 0.75rem; margin-top: 1.5rem; }
        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-muted);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<nav>
    <a href="#" class="nav-brand">⚡ E-Commerce UTS</a>
    <div class="nav-right">
        @auth
        <span class="nav-user">{{ Auth::user()->name }} / <span>{{ Auth::user()->role }}</span></span>
        <form action="{{ route('logout') }}" method="POST" style="display:inline">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
        @endauth
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">✓ {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">✕ {{ session('error') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>