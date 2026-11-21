<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - PELITA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @stack('styles')
</head>
<body>
    <header class="navbar">
        <a href="#" class="brand">
            <img src="{{ asset('images/logo-navbar.png') }}" alt="Pelita">
        </a>

        <nav class="nav-links">
            <a href="#">Beranda</a>
            <a href="#">Buat Laporan Khusus</a>
            <a href="#">Catatan</a>
            <a href="{{ route('whisper-wall.index') }}"
               class="{{ request()->routeIs('whisper-wall.*') ? 'active' : '' }}">Whisper wall</a>
        </nav>

        <div class="user">
            <span>{{ auth()->user()->name ?? 'Tamu' }}</span>
            <i class="bi bi-person-circle"></i>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>