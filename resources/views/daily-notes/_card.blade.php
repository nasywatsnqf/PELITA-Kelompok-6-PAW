@php $timeline = $timeline ?? false; @endphp
<article class="card note {{ $timeline ? 'tl-card' : ''}}">
    <div class="top">
        <span class="badge">
            <svg><use href="#i-{{ $n->category === 'kronologi' ? 'clock' : 'heart' }}"/></svg>
            {{ $n->category === 'kronologi' ? 'Kronologi Kejadian' : 'Curahan Hati' }}
        </span>
        @unless ($timeline)
            <span>{{ $n->event_at->translatedFormat('d M Y') }} • {{ $n->event_at->format('H:i') }} WIB</span>
        @endunless
    </div>
    <h3>{{ $n->title }}</h3>
    <p>{{ $n->is_locked ? 'Isi catatan ini terkunci.' : \Illuminate\Support\Str::limit($n->plain_content, 160) }}</p>
    @if ($n->emotion)
        <div class="cond"><svg><use href="#i-emo-{{ $n->emotion }}"/></svg>Kondisi: {{ \App\Models\DailyNote::EMOTIONS[$n->emotion] ?? $n->emotion }}</div>
    @endif
    <div class="bar">
        <div>
            @if ($n->is_locked)
                <span style="display:flex;gap:6px;align-items:center"><svg><use href="#i-lock"/></svg>Terkunci</span>
            @endif
            <a href="{{ route('catatan.edit', $n) }}" aria-label="Ubah"><svg><use href="#i-edit"/></svg></a>
            <form class="inline" method="POST" action="{{ route('catatan.pin', $n) }}">
                @csrf @method('PATCH')
                <button type="submit" class="{{ $n->is_pinned ? 'on' : '' }}" aria-label="Sematkan">
                    <svg><use href="#i-pin"/></svg>{{ $n->is_pinned ? 'Tersemat' : '' }}
                </button>
            </form>
        </div>
        <form class="inline" method="POST" action="{{ route('catatan.destroy', $n) }}" onsubmit="return confirm('Hapus catatan ini?')">
            @csrf @method('DELETE')
            <button type="submit" aria-label="Hapus"><svg><use href="#i-trash"/></svg></button>
        </form>
    </div>
</article>