<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - PELITA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <main class="login-page">
        <img src="{{ asset('images/logo-pelita.png') }}" alt="PELITA" class="logo">

        <h1>Buat Akun PELITA Anda</h1>
        <p class="subtitle">Ruang aman untuk pemulihan dan dukungan. Identitas Anda adalah prioritas kami.</p>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="login-form" novalidate>
            @csrf

            <div class="field">
                <label for="email">Email / ID pengguna</label>
                <div class="input-wrap">
                    <i class="bi bi-at"></i>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           placeholder="@email.com" autocomplete="email">
                </div>
                @error('email')<small class="error">{{ $message }}</small>@enderror
            </div>

            <div class="field">
                <label for="password">Kata Sandi</label>
                <div class="input-wrap">
                    <i class="bi bi-lock"></i>
                    <input type="password" id="password" name="password"
                           placeholder="*****" autocomplete="current-password">
                </div>
                @error('password')<small class="error">{{ $message }}</small>@enderror
            </div>

            <button type="submit" class="btn-login">Masuk <i class="bi bi-arrow-right"></i></button>

            <p class="switch">Belum memiliki Akun? <a href="{{ route('register') }}">Daftar.</a></p>
            <p class="privacy">
                Dengan mendaftar, Anda menyetujui <a href="#">Ketentuan Privasi</a> kami.
                Data Anda dienkripsi sepenuhnya.
            </p>
        </form>

        <div class="exit-row">
            <button type="button" class="btn-exit"
                    onclick="window.location.replace('https://www.google.com')">
                KELUAR <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </main>
</body>
</html>