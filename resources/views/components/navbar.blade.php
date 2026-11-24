<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .navbar {
        width: 100%;
        height: 72px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 5.5%;
        border-bottom: 1px solid #e8e3e3;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        font-family: 'Poppins', sans-serif;
        background-color: #ffffff;
    }

    .navbar-logo img {
        width: 140px;
        height: auto;
        display: block;
        object-fit: contain;
    }

    .navbar-menu {
        display: flex;
        align-items: center;
        gap: 35px;
    }

    .navbar-menu a {
        text-decoration: none;
        color: #701d32;
        font-size: 15px;
        font-weight: 600;
        transition: color 0.2s ease;
    }

    .navbar-menu a:hover { color: #b43f5b; }

    .navbar-profile {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 4px 5px 4px 15px;
        border-radius: 30px;
        background-color: #ffdfc4;
        color: #701d32;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
    }

    .profile-icon {
        width: 37px;
        height: 37px;
        flex: 0 0 37px;
        border-radius: 50%;
        overflow: hidden;
        background-color: #701d32;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-icon img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        border-radius: 50%;
    }

    .profile-icon svg {
        width: 29px;
        height: 29px;
    }

    @media (max-width: 850px) {
        .navbar { padding: 0 3%; }
        .navbar-menu { gap: 15px; }
        .navbar-menu a { font-size: 12px; }
    }

    @media (max-width: 600px) {
        .navbar {
            height: auto;
            min-height: 65px;
            flex-wrap: wrap;
            gap: 12px;
            padding: 12px 4%;
        }
        .navbar-menu {
            order: 3;
            width: 100%;
            justify-content: space-between;
            gap: 10px;
            overflow-x: auto;
        }
        .navbar-menu a { white-space: nowrap; }
        .navbar-logo img { width: 95px; }
    }
</style>

<nav class="navbar">
    <div class="navbar-logo">
        <a href="/">
            <img src="{{ asset('images/logo-pelita-navbar.png') }}" alt="Logo Pelita">
        </a>
    </div>

    <div class="navbar-menu">
        <a href="/">Beranda</a>
        <a href="#">Buat Laporan Khusus</a>
        <a href="#">Catatan</a>
        <a href="#">Whisper Wall</a>
    </div>

    <a href="{{ route('profil') }}" class="navbar-profile">
        <span>{{ Auth::user()->name }}</span>
        <div class="profile-icon">
            @if (Auth::user()->profile_photo)
                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Foto profil">
            @else
                <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <circle cx="20" cy="13" r="8" fill="#FFDFC4"/>
                    <path d="M5 35C5 26.7 11.7 21 20 21C28.3 21 35 26.7 35 35" fill="#FFDFC4"/>
                </svg>
            @endif
        </div>
    </a>
</nav>