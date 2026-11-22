@extends('layouts.app')

@section('title', 'Whisper Wall')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/whisper-wall.css') }}">
@endpush

@section('content')
<section class="hero">
    <span class="badge"><i class="bi bi-flower1"></i> Tempat Teduh Bersuara</span>
    <h1>Whisper Wall</h1>
    <p class="lead">Ruang aman untuk membagikan cerita, pengalaman, keluh kesah, dan perasaanmu secara bebas.</p>
    <p class="sub">Di sini kita saling mendengar tanpa menghakimi, merangkul dalam keheningan, dan saling menguatkan langkah kecil hari ini.</p>
</section>

@if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<section class="composer">
    <form method="POST" action="{{ route('whisper-wall.store') }}">
        @csrf
        <div class="composer-title">
            <span class="icon-circle"><i class="bi bi-pencil-square"></i></span>
            Tuliskan Ceritamu Hari Ini
        </div>

        <textarea name="content" rows="4"
            placeholder="Tuliskan apa yang sedang membebani pikiranmu atau ceritamu hari ini secara anonim...">{{ old('content') }}</textarea>
        @error('content') <small class="error">{{ $message }}</small> @enderror

        <div class="composer-footer">
            <label class="anon-toggle">
                <i class="bi bi-eye-slash"></i> Kirim Anonim
                <input type="checkbox" name="is_anonymous" value="1" @checked($errors->any() ? old('is_anonymous') : true)>
                <span class="switch"></span>
            </label>
            <button type="submit" class="btn-share">Bagikan Cerita <i class="bi bi-send"></i></button>
        </div>
    </form>
</section>

<section class="feed">
    <div class="feed-head">
        <span class="chip-active"><i class="bi bi-clock"></i> Terbaru</span>
        <div class="arrows">
            <button type="button" id="prev" aria-label="Sebelumnya"><i class="bi bi-chevron-left"></i></button>
            <button type="button" id="next" aria-label="Berikutnya"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>

    <div class="carousel" id="carousel">
        @forelse ($posts as $post)
            <article class="card">
                <div class="card-head">
                    <span class="hash"><i class="bi bi-hash"></i></span>
                    <div class="who">
                        <strong>{{ $post->is_anonymous ? 'Anonim #' . $post->id : ($post->user->name ?? 'Pengguna') }}</strong>
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </div>

                    @auth
                        @if ($post->user_id === auth()->id())
                            <form method="POST" action="{{ route('whisper-wall.destroy', $post->id) }}"
                                  onsubmit="return confirm('Hapus cerita ini?')" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Hapus"><i class="bi bi-trash"></i></button>
                            </form>
                        @endif
                    @endauth
                </div>

                <p class="card-body">{{ $post->content }}</p>

                <div class="card-actions">
                    <button type="button" class="react" data-url="{{ route('whisper-wall.react', [$post->id, 'hug']) }}">
                        <i class="bi bi-heart"></i> Pelukan Hangat <span>{{ $post->hug_count }}</span>
                    </button>
                    <button type="button" class="react" data-url="{{ route('whisper-wall.react', [$post->id, 'support']) }}">
                        <i class="bi bi-people"></i> Tinggalkan Semangat <span>{{ $post->support_count }}</span>
                    </button>
                </div>
            </article>
        @empty
            <p class="empty">Belum ada cerita. Jadilah yang pertama berbagi.</p>
        @endforelse
    </div>

    <p class="hint">Geser ke samping untuk menjelajahi cerita lainnya <i class="bi bi-hand-index-thumb"></i></p>
</section>

<p class="footer-note">Cerita baru selalu mengalir saat seseorang butuh ditenangkan. Napas sebentar, kamu tidak sendirian.</p>
@endsection

@push('scripts')
<script>
    const carousel = document.getElementById('carousel');
    const SPEED = 35; // piksel per detik, ubah untuk lebih cepat atau lambat
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let loopWidth = 0, pos = 0, paused = false, resumeTimer, last = null;

    // Gandakan kartu agar putarannya mulus (hanya jika kartu melebihi lebar layar)
    function setupLoop() {
        carousel.querySelectorAll('.card.clone').forEach(c => c.remove());
        loopWidth = 0;

        const originals = carousel.querySelectorAll('.card');
        if (reduceMotion || originals.length === 0 || carousel.scrollWidth <= carousel.clientWidth) return;

        originals.forEach(card => {
            const copy = card.cloneNode(true);
            copy.classList.add('clone');
            carousel.appendChild(copy);
        });
        loopWidth = carousel.querySelector('.card.clone').offsetLeft - originals[0].offsetLeft;
    }

    function pauseFor(ms) {
        paused = true;
        clearTimeout(resumeTimer);
        resumeTimer = setTimeout(() => { pos = carousel.scrollLeft; paused = false; }, ms);
    }

    function tick(now) {
        if (last === null) last = now;
        const dt = Math.min(now - last, 50);
        last = now;

        if (loopWidth && !paused) {
            pos += SPEED * dt / 1000;
            if (pos >= loopWidth) pos -= loopWidth;
            carousel.scrollLeft = pos;
        }
        requestAnimationFrame(tick);
    }

    // Panah
    document.getElementById('prev').onclick = () => { pauseFor(1500); carousel.scrollBy({ left: -420, behavior: 'smooth' }); };
    document.getElementById('next').onclick = () => { pauseFor(1500); carousel.scrollBy({ left: 420, behavior: 'smooth' }); };

    // Berhenti saat kursor di atas kartu atau layar disentuh
    carousel.addEventListener('mouseenter', () => { clearTimeout(resumeTimer); paused = true; });
    carousel.addEventListener('mouseleave', () => { pos = carousel.scrollLeft; paused = false; });
    carousel.addEventListener('touchstart', () => { clearTimeout(resumeTimer); paused = true; }, { passive: true });
    carousel.addEventListener('touchend', () => pauseFor(2000), { passive: true });

    // Reaksi (satu pendengar untuk semua kartu, termasuk salinan)
    carousel.addEventListener('click', async (e) => {
        const btn = e.target.closest('.react');
        if (!btn || btn.disabled) return;

        const same = carousel.querySelectorAll('.react[data-url="' + btn.dataset.url + '"]');
        same.forEach(b => b.disabled = true);

        const res = await fetch(btn.dataset.url, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
        });

        if (res.ok) {
            const data = await res.json();
            same.forEach(b => { b.querySelector('span').textContent = data.count; b.classList.add('reacted'); });
        } else {
            same.forEach(b => b.disabled = false);
        }
    });

    window.addEventListener('load', () => { setupLoop(); requestAnimationFrame(tick); });
    window.addEventListener('resize', () => { setupLoop(); pos = 0; carousel.scrollLeft = 0; });
</script>
@endpush