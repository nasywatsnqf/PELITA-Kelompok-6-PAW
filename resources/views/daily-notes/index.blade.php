@extends('daily-notes.layout')
@section('title', 'Catatan Aman - Pelita')

@section('content')
<div class="head">
    <div>
        <h1>Catatan Aman &amp; Kronologi Peristiwa</h1>
        <p>Ruang privat untuk mencatat kronologi kejadian secara detail atau sekadar menuangkan isi hati. Catatan ini dienkripsi dan hanya dapat diakses oleh Anda.</p>
    </div>
    <button class="btn pri" type="button"><svg><use href="#i-check"/></svg>Ekspor Bukti Linimasa</button>
</div>

@include('daily-notes._form')

@php 
    $tabs = [
        'all'       => ['list',  'Semua Catatan'],
        'kronologi' => ['clock', 'Kronologi Kasus (Bukti Linimasa)'],
        'curahan'   => ['heart', 'Curahan Hati & Refleksi Emosional'],
        'pinned'    => ['pin',   'Catatan Tersemat'],
    ];
    $emptyMsg = $q !== '' ? 'Tidak ada catatan yang cocok dengan pencarianmu.' : match ($filter) {
        'kronologi' => 'Belum ada kronologi. Catat kejadian lengkap dengan tanggal dan jam.',
        'curahan'   => 'Belum ada curahan hati. Tuliskan perasaanmu kapan pun kamu siap.',
        'pinned'    => 'Belum ada catatan tersemat. Klik ikon pin pada sebuah catatan untuk menyematkannya.',
        default     => 'Belum ada catatan. Tulis catatan pertamamu di atas.',
    };
@endphp

<div class="tabs">
    @foreach ($tabs as $key => $t)
        <a href="{{ route('catatan.index', ['filter' => $key]) }}" class="tab {{ $filter === $key ? 'on' : '' }}">
            <svg><use href="#i-{{ $t[0] }}"/></svg>{{ $t[1] }} <span class="n">{{ $counts[$key] }}</span>
        </a>
    @endforeach
    <div class="net"><svg><use href="#i-shield"/></svg><span>Koneksi Lokal Aman<br>(Offline-Ready)</span></div>
</div>

<div class="list-h">
    <h2>Daftar Arsip Catatan</h2>
    @if ($latest)
        <span><svg><use href="#i-clock"/></svg>Diperbarui {{ $latest->diffForHumans() }}</span>
    @endif
</div>

<form class="search" method="GET" action="{{ route('catatan.index') }}" role="search">
    <input type="hidden" name="filter" value="{{ $filter }}">
    <svg><use href="#i-search"/></svg>
    <input type="search" name="q" value="{{ $q }}" placeholder="Cari catatan berdasarkan judul atau isi..." aria-label="Cari catatan">
</form>

@if ($notes->isEmpty())
    <div class="empty">{{ $emptyMsg }}</div>>
@elseif ($filter === 'kronologi')
        <div class="tl">
        @foreach ($notes->groupBy(fn ($n) => $n->event_at->format('Y-m-d')) as $items)
            <div class="tl-day">{{ $items->first()->event_at->translatedFormat('d F Y') }}</div>
            @foreach ($items as $n)
                <div class="tl-item">
                    <span class="tl-time">{{ $n->event_at->format('H.i') }} WIB</span>
                    <span class="tl-col"><i></i></span>
                    @include('daily-notes._card', ['n' => $n, 'timeline' => true])
                </div>
            @endforeach
        @endforeach
    </div>
@else
    @foreach ($notes as $n)
        @include('daily-notes._card', ['n' => $n])
    @endforeach
@endif

<section class="exp">
    <div>
        <div class="tag"><svg><use href="#i-clock"/></svg>Integrasi Modul Pelaporan (Chessa) &amp; Advokasi Hukum</div>
        <h2>Ekspor Linimasa untuk Laporan Resmi</h2>
        <p>Pindahkan kronologi kejadian yang telah Anda catat langsung ke Formulir Laporan Resmi atau buat bundel dokumen pembuktian bertanda air (watermarked) untuk pendamping hukum/psikolog tanpa harus mengetik ulang.</p>
    </div>
    <div class="b">
        <button class="btn pri" type="button">Kirim ke Modul Laporan</button>
        <button class="btn sec" type="button"><svg><use href="#i-folder"/></svg>Unduh Berkas Advokasi (.zip)</button>
    </div>
</section>
@endsection