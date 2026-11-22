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

       <div class="user-menu" id="userMenu">
    <button type="button" class="user-btn" id="userBtn" aria-haspopup="true" aria-expanded="false">
        <span>{{ auth()->check() ? auth()->user()->name : 'Tamu' }}</span>
        <i class="bi bi-person-circle"></i>
    </button>

    <div class="user-dropdown">
        @auth
            <div class="user-info">
                <strong>{{ auth()->user()->name }}</strong>
                <small>{{ auth()->user()->email }}</small>
            </div>
            <a href="{{ Route::has('profile.edit') ? route('profile.edit') : '#' }}">
                <i class="bi bi-person"></i> Profil Saya
            </a>
            @if (Route::has('logout'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"><i class="bi bi-box-arrow-right"></i> Keluar</button>
                </form>
            @endif
        @else
            <a href="{{ Route::has('login') ? route('login') : '#' }}"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
            <a href="{{ Route::has('register') ? route('register') : '#' }}"><i class="bi bi-person-plus"></i> Daftar</a>
        @endauth
        </div>
    </div>
    </header>

    <main>
        @yield('content')
    </main>

    <script>
    const userMenu = document.getElementById('userMenu');
    const userBtn = document.getElementById('userBtn');

    function closeUserMenu() {
        userMenu.classList.remove('open');
        userBtn.setAttribute('aria-expanded', 'false');
    }

    userBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const open = userMenu.classList.toggle('open');
        userBtn.setAttribute('aria-expanded', open);
    });
    document.addEventListener('click', (e) => { if (!userMenu.contains(e.target)) closeUserMenu(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeUserMenu(); });
    </script>

    @stack('scripts')
</body>
</html>