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
    document.getElementById('prev').onclick = () => carousel.scrollBy({ left: -420, behavior: 'smooth' });
    document.getElementById('next').onclick = () => carousel.scrollBy({ left: 420, behavior: 'smooth' });

    document.querySelectorAll('.react').forEach(btn => {
        btn.addEventListener('click', async () => {
            btn.disabled = true;
            const res = await fetch(btn.dataset.url, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
            });
            if (res.ok) {
                const data = await res.json();
                btn.querySelector('span').textContent = data.count;
                btn.classList.add('reacted');
            } else {
                btn.disabled = false;
            }
        });
    });
</script>
@endpush