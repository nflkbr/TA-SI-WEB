<?php // Tidak perlu session_start(), Laravel handle otomatis ?>

@if (session()->has('user'))
    {{ header('Location: /') }}  
@endif

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

<div class="card p-4" style="width: 350px;">
    <h4 class="text-center mb-3">Login</h4>

    {{-- Tampilkan pesan error dari AuthController --}}
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Ganti action="controller/proses_login.php" dengan route Laravel --}}
    <form method="POST" action="/login">
        @csrf {{-- wajib di setiap form POST Laravel --}}

        <div class="mb-3">
            <label class="form-label">Username</label>
            {{-- Ganti $_COOKIE['username'] dengan cookie() helper --}}
            <input type="text" name="username" class="form-control"
                value="{{ cookie('username') ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input">
            <label class="form-check-label">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-warning w-100">Login</button>
    </form>
</div>

</body>
</html>