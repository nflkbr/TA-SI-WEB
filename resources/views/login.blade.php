<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cibaduyut Shoes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card bg-secondary p-4" style="width: 420px;">

            <h3 class="text-center mb-4">Login</h3>

            @if (session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                {{-- reCAPTCHA v2 --}}
                <div class="mb-3">
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    @error('g-recaptcha-response')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning w-100">Login</button>

                <div class="text-center mt-3">
                    <small>Belum punya akun?
                        <a href="{{ route('register') }}" class="text-warning">Daftar di sini</a>
                    </small>
                </div>
            </form>

            {{-- Separator --}}
            <div class="d-flex align-items-center my-3">
                <hr class="flex-grow-1 border-light">
                <span class="mx-2 text-white-50 small">atau masuk dengan</span>
                <hr class="flex-grow-1 border-light">
            </div>

            {{-- Tombol Google Auth --}}
            <a href="{{ route('google.redirect') }}"
               class="btn btn-light w-100 d-flex align-items-center justify-content-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 48 48">
                    <path fill="#EA4335" d="M24 9.5c3.14 0 5.95 1.08 8.17 2.84l6.08-6.08C34.46 3.1 29.5 1 24 1 14.82 1 7.07 6.48 3.64 14.22l7.08 5.5C12.4 13.67 17.73 9.5 24 9.5z"/>
                    <path fill="#4285F4" d="M46.1 24.5c0-1.64-.15-3.22-.42-4.74H24v9h12.42c-.54 2.9-2.18 5.36-4.64 7.01l7.18 5.57C43.04 37.27 46.1 31.3 46.1 24.5z"/>
                    <path fill="#FBBC05" d="M10.72 28.28A14.6 14.6 0 0 1 9.5 24c0-1.49.26-2.93.72-4.28l-7.08-5.5A23.93 23.93 0 0 0 0 24c0 3.87.93 7.53 2.57 10.76l8.15-6.48z"/>
                    <path fill="#34A853" d="M24 47c5.5 0 10.12-1.82 13.5-4.95l-7.18-5.57C28.6 38.4 26.42 39.5 24 39.5c-6.27 0-11.6-4.17-13.28-9.72l-8.15 6.48C6.07 43.52 14.45 47 24 47z"/>
                </svg>
                Login dengan Google
            </a>

        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>