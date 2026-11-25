@php
    $note = $note ?? null;
    $cat  = old('category', $note?->category ?? 'kronologi');
    $emo  = old('emotion', $note?->emotion ?? 'netral');
    $date = old('event_date', ($note?->event_at ?? now())->format('Y-m-d'));
    $time = old('event_time', ($note?->event_at ?? now())->format('H:i'));
@endphp

<form class="card" id="noteForm" method="POST" autocomplete="off" data-draft="{{ $note ? '0' : '1' }}"
      action="{{ $note ? route('catatan.update', $note) : route('catatan.store') }}">
    @csrf
    @if ($note) @method('PUT') @endif

    <header>
        <h2><svg><use href="#i-edit"/></svg>{{ $note ? 'Ubah Catatan' : 'Buat Catatan atau Catat Kronologi Baru' }}</h2>
        @unless ($note)
            <span class="auto"><svg><use href="#i-check"/></svg>Tersimpan otomatis sebagai draf lokal</span>
        @endunless
    </header>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert err" role="alert">
                <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        <div class="row">
            <div>
                <span class="lbl">Pilih Kategori Catatan</span>
                <input type="hidden" name="category" id="categoryInput" value="{{ $cat }}">
                <div class="seg" id="cat">
                    <button type="button" data-v="kronologi" class="{{ $cat === 'kronologi' ? 'on' : '' }}"><svg><use href="#i-clock"/></svg>Kronologi Kejadian</button>
                    <button type="button" data-v="curahan" class="{{ $cat === 'curahan' ? 'on' : '' }}"><svg><use href="#i-heart"/></svg>Curahan Hati</button>
                </div>
            </div>
            <div>
                <span class="lbl">Tanggal &amp; Waktu Kejadian Akurat</span>
                <div class="dt">
                    <input type="date" name="event_date" value="{{ $date }}" aria-label="Tanggal">
                    <input type="time" name="event_time" value="{{ $time }}" aria-label="Waktu">
                </div>
            </div>
            <div>
                <span class="lbl">Kondisi Emosional Saat Menulis</span>
                <input type="hidden" name="emotion" id="emotionInput" value="{{ $emo }}">
                <div class="emo" id="emo">
                    @foreach (\App\Models\DailyNote::EMOTIONS as $key => $label)
                        <button type="button" data-v="{{ $key }}" class="{{ $emo === $key ? 'on' : '' }}"><svg><use href="#i-emo-{{ $key }}"/></svg>{{ $label }}</button>
                    @endforeach
                </div>
            </div>
        </div>
 
        <label for="title">Judul Catatan</label>
        <input class="title" id="title" name="title" value="{{ old('title', $note?->title) }}"
               placeholder="Contoh: Kejadian di Ruang Rapat Lt. 3 atau Yang Kurasa Hari Ini...">

        <label>Detail Catatan / Narasi Kronologis <span class="hint">Gunakan tombol cap waktu untuk memisahkan urutan kejadian</span></label>
        <div class="ed">
            <div class="tb">
                <button type="button" data-cmd="bold" aria-label="Tebal">B</button>
                <button type="button" data-cmd="italic" aria-label="Miring"><i>I</i></button>
                <button type="button" data-cmd="insertUnorderedList" aria-label="Daftar">☰</button>
                <button type="button" class="chip" id="stamp"><svg><use href="#i-clock"/></svg><span id="stampTxt">Sisipkan Cap Waktu</span></button>
                <button type="button" class="chip" id="attach"><svg><use href="#i-clip"/></svg>Lampirkan Berkas/Foto Aman</button>
            </div>
            <input type="hidden" name="content" id="contentInput">
            <div id="body" contenteditable="true" role="textbox" aria-multiline="true" data-ph="Tuliskan peristiwa dengan tenang. Anda tidak harus menyelesaikan semuanya hari ini...">{!! old('content', $note?->content) !!}</div>
        </div>

        <div class="foot">
            <div class="chk">
                <label><input type="checkbox" name="is_locked" value="1" @checked(old() ? old('is_locked') : ($note?->is_locked ?? false))><svg><use href="#i-lock"/></svg>Kunci dengan PIN Tambahan</label>
                <label><input type="checkbox" name="hide_from_history" value="1" @checked(old() ? old('hide_from_history') : ($note?->hide_from_history ?? true))>Sembunyikan dari riwayat cepat</label>
            </div>
            <div class="acts">
                @if ($note)
                    <a class="btn sec" href="{{ route('catatan.index') }}">Batal</a>
                @else
                    <button class="btn sec" type="button" id="cancelBtn">Batal</button>
                @endif
                <button class="btn pri" type="submit"><svg><use href="#i-lock"/></svg>{{ $note ? 'Simpan Perubahan' : 'Simpan ke Brankas Aman' }}</button>
            </div>
        </div>
    </div>
</form>