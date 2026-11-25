<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pelita')</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/daily-notes.css') }}"> 
</head>
<body>
@include('daily-notes._icons')      
<nav>
    <a href="{{ route('catatan.index') }}" class="logo"><img src="{{ asset('images/logo-pelita.svg') }}" alt="Pelita"></a>
    <a href="#">Beranda</a>
    <a href="#">Buat Laporan Khusus</a>
    <a href="{{ route('catatan.index') }}" class="on" aria-current="page">Catatan</a>
    <a href="#">Whisper wall</a>
    <div class="user">{{ auth()->user()->name }} <svg><use href="#i-user"/></svg></div>
</nav>
<main>
    @if (session('success'))
        <div class="alert ok" role="status">{{ session('success') }}</div>
    @endif
    @yield('content')
</main>
<script src="{{ asset('js/daily-notes.js') }}"></script>
</body>
</html>