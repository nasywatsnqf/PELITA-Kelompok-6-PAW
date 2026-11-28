
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan Khusus - PELITA</title>

    <style>
        *{
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #fff9fa;
    color: #702536;
    font-size: 14px;
}


nav {
    min-height: 76px;
    padding: 10px 5%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    background: white;
    border-bottom: 1px solid #f0e3e6;
}

.logo {
    flex-shrink: 0;
    width: 180px;
}

.logo img {
    display: block;
    width: 100%;
    height: auto;
    max-height: 52px;
    object-fit: contain;
    object-position: left center;
}

.menu {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 30px;
    flex: 1;
}

.menu a {
    text-decoration: none;
    color: #754552;
    font-size: 13px;
    white-space: nowrap;
}

.menu a:hover {
    color: #702536;
}

.menu a.active {
    font-weight: bold;
    color: #702536;
}

.profile {
    flex-shrink: 0;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #f8edef;
    display: grid;
    place-items: center;
}


.page {
    max-width: 1200px;
    margin: 35px auto;
    padding: 0 20px;
}

.page-heading {
    margin-bottom: 25px;
}

.heading-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}

.page-heading h1 {
    font-size: 27px;
    margin: 0 0 8px;
}

.page-heading p {
    margin: 0;
    color: #a66c78;
    line-height: 1.6;
}

.btn-history {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 11px 17px;
    background: #fff;
    border: 1px solid #e8cdd4;
    border-radius: 8px;
    color: #702536;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none !important;
    white-space: nowrap;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.btn-history span {
    font-size: 14px;
}

.btn-history:hover {
    background: #702536;
    border-color: #702536;
    color: #fff !important;
    box-shadow: 0 3px 8px #70253620;
    transform: translateY(-1px);
}

.btn-history:link,
.btn-history:visited,
.btn-history:active {
    color: #702536;
    text-decoration: none !important;
}


.layout {
    display: grid;
    grid-template-columns: minmax(0, 2fr) minmax(260px, 0.85fr);
    gap: 22px;
    align-items: start;
}


.card {
    background: white;
    border: 1px solid #eedfe3;
    border-radius: 13px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px #70253608;
}

.section-title {
    font-size: 17px;
    margin: 0 0 7px;
}

.section-desc {
    color: #a77982;
    font-size: 12px;
    margin: 0 0 22px;
    line-height: 1.5;
}


.field {
    margin-bottom: 19px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-size: 13px;
    font-weight: bold;
}

.optional {
    color: #a98b91;
    font-weight: normal;
}

input[type="text"],
input[type="date"],
select,
textarea {
    width: 100%;
    padding: 12px 13px;
    border: 1px solid #e6d5da;
    border-radius: 7px;
    background: #fffdfd;
    color: #63313d;
    font-family: inherit;
    font-size: 13px;
    outline: none;
}

input:focus,
select:focus,
textarea:focus {
    border-color: #a65b6d;
    box-shadow: 0 0 0 3px #f8edef;
}

textarea {
    min-height: 115px;
    resize: vertical;
}


.category-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.category-option {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 12px;
    border: 1px solid #ead9de;
    border-radius: 8px;
    background: #fffdfd;
    font-size: 12px;
    font-weight: normal;
    cursor: pointer;
    transition: 0.2s;
}

.category-option:hover {
    background: #fff7f8;
    border-color: #d9b7c0;
}

.category-option input {
    accent-color: #702536;
}


.upload-box {
    border: 2px dashed #dfc2ca;
    background: #fff9fa;
    border-radius: 10px;
    padding: 27px 15px;
    text-align: center;
    color: #9d6673;
}

.upload-icon {
    font-size: 27px;
    margin-bottom: 8px;
}

.upload-box strong {
    display: block;
    margin-bottom: 6px;
    color: #702536;
}

.upload-box small {
    font-size: 11px;
}

.upload-button {
    display: inline-block;
    margin: 12px 0;
    padding: 10px 20px;
    border-radius: 7px;
    background: #702536;
    color: white;
    font-size: 12px;
    cursor: pointer;
    transition: 0.2s;
}

.upload-button:hover {
    background: #541b29;
}

#daftar-file {
    margin-top: 12px;
    color: #702536;
    font-size: 12px;
    line-height: 1.8;
}


.choice-list {
    display: grid;
    gap: 11px;
}

.choice {
    display: flex;
    gap: 12px;
    padding: 15px;
    border: 1px solid #ead9de;
    border-radius: 9px;
    cursor: pointer;
    background: white;
    transition: 0.2s;
}

.choice:hover {
    border-color: #d9b7c0;
    background: #fffdfd;
}

.choice:has(input:checked) {
    border-color: #a85b6d;
    background: #fff7f8;
}

.choice input {
    accent-color: #702536;
    margin-top: 3px;
    flex-shrink: 0;
}

.choice strong {
    display: block;
    font-size: 13px;
    margin-bottom: 5px;
}

.choice span {
    color: #a77982;
    font-size: 11px;
    line-height: 1.5;
}


.button-area {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 20px;
}

button {
    padding: 12px 20px;
    border-radius: 7px;
    font-weight: bold;
    font-size: 12px;
    cursor: pointer;
    transition: 0.2s;
}

.btn-draft {
    background: white;
    color: #702536;
    border: 1px solid #cbaab2;
}

.btn-draft:hover {
    background: #fff7f8;
}

.btn-send {
    background: #702536;
    color: white;
    border: 1px solid #702536;
}

.btn-send:hover {
    background: #541b29;
    border-color: #541b29;
}


.side-card {
    background: white;
    border: 1px solid #eedfe3;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 16px;
}

.side-card h3 {
    margin: 0 0 15px;
    font-size: 15px;
}

.info-item {
    display: flex;
    gap: 10px;
    margin-bottom: 16px;
    line-height: 1.5;
}

.info-icon {
    width: 30px;
    height: 30px;
    flex-shrink: 0;
    border-radius: 8px;
    background: #f8edef;
    display: grid;
    place-items: center;
}

.info-item strong {
    display: block;
    font-size: 12px;
    margin-bottom: 3px;
}

.info-item p {
    margin: 0;
    color: #a77982;
    font-size: 11px;
}

.help-card {
    background: #fff1e7;
    border-color: #f6dfce;
}

.help-card p {
    color: #956c5c;
    font-size: 12px;
    line-height: 1.6;
}


.alert {
    padding: 12px;
    margin-bottom: 18px;
    border-radius: 7px;
    background: #eaf5ef;
    color: #286b48;
}


@media (max-width: 800px) {
    nav {
        padding: 10px 18px;
    }

    .menu {
        display: none;
    }

    .layout {
        grid-template-columns: 1fr;
    }
}

/* ==============================
   RESPONSIVE MOBILE
============================== */
@media (max-width: 600px) {
    .heading-content {
        align-items: flex-start;
        flex-direction: column;
    }

    .btn-history {
        align-self: flex-start;
    }
}

@media (max-width: 500px) {
    .category-list {
        grid-template-columns: 1fr;
    }

    .card {
        padding: 18px;
    }

    .button-area {
        flex-direction: column;
    }

    .button-area button {
        width: 100%;
    }

    .page-heading h1 {
        font-size: 23px;
    }
}
    </style>
</head>

<body>

<nav>
    <div class="logo">
    <img src="{{ asset('images/logo-pelita.png') }}" alt="Logo PELITA">
    </div>

    <div class="menu">
        <a href="#">Beranda</a>
        <a href="#" class="active">Buat Laporan Khusus</a>
        <a href="{{ route('laporan.index') }}">Catatan</a>
        <a href="#">Whisper Wall</a>
    </div>

    <div class="profile">👤</div>
</nav>

<main class="page">

    <div class="page-heading">
    <div class="heading-content">
        <div>
            <h1>Buat Laporan Khusus</h1>
            <p>Sampaikan kejadian yang kamu alami dengan aman. Kami akan menjaga setiap informasi yang kamu berikan.</p>
        </div>

        <a href="{{ route('laporan.index') }}" class="btn-history">
            <span>▤</span> Lihat Laporan Lama
        </a>
    </div>
</div>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="layout">

        <div>
            <form action="{{ route('laporan.store') }}"
      method="POST"
      enctype="multipart/form-data">
                @csrf

                <section class="card">
                    <h2 class="section-title">01. Identifikasi Kejadian</h2>
                    <p class="section-desc">Ceritakan informasi dasar mengenai kejadian yang ingin kamu laporkan.</p>

                    <div class="field">
                        <label>Jenis Insiden</label>
                        <div class="category-list">
                            @foreach([
                                'Perundungan',
                                'Pelecehan Seksual',
                                'Kekerasan Fisik',
                                'Kekerasan Verbal',
                                'Intimidasi',
                                'Diskriminasi',
                                'Lainnya'
                            ] as $kategori)
                                <label class="category-option">
                                    <input type="checkbox" name="kategori_insiden[]" value="{{ $kategori }}">
                                    {{ $kategori }}
                                </label>
                            @endforeach
                        </div>
                        @error('kategori_insiden')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="field">
                        <label>Tanggal Kejadian</label>
                        <input type="date" name="tanggal_kejadian" value="{{ old('tanggal_kejadian') }}">
                    </div>

                    <div class="field">
                        <label>Lokasi Kejadian</label>
                        <input type="text" name="lokasi" placeholder="Masukkan lokasi kejadian" value="{{ old('lokasi') }}">
                    </div>

                    <div class="field">
                        <label>Pihak yang Terlibat <span class="optional">(Opsional)</span></label>
                        <input type="text" name="pihak_terlibat" placeholder="Informasi pihak yang terlibat" value="{{ old('pihak_terlibat') }}">
                    </div>

                    <div class="field">
                        <label>Kronologi Kejadian</label>
                        <textarea name="kronologi" placeholder="Ceritakan kronologi kejadian secara runtut...">{{ old('kronologi') }}</textarea>
                        @error('kronologi')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </section>

                <section class="card">
                    <h2 class="section-title">02. Unggah Bukti Digital</h2>
                    <p class="section-desc">Bukti pendukung dapat membantu proses penanganan laporan.</p>

                    
<div class="upload-box">
    <div class="upload-icon">☁</div>
    <strong>Area Unggah Bukti Digital</strong>

    <p>Klik untuk memilih file atau seret file ke sini</p>

    <label for="bukti" class="upload-button">
        Pilih File
    </label>

    <input
        type="file"
        id="bukti"
        name="bukti[]"
        multiple
        accept=".jpg,.jpeg,.png,.pdf,.mp3,.wav,.mp4,.mov"
        style="display: none;"
    >

    <small>Format JPG, PNG, PDF, MP3, WAV, MP4, MOV. Maksimal 20 MB per file.</small>

    <div id="daftar-file"></div>
</div>

                </section>

                <section class="card">
                    <h2 class="section-title">03. Preferensi Tindak Lanjut</h2>
                    <p class="section-desc">Pilih jalur penanganan yang sesuai dengan kebutuhanmu.</p>

                    <div class="choice-list">
                        <label class="choice">
                            <input type="radio" name="preferensi_tindak_lanjut" value="arsip_pribadi" required>
                            <div>
                                <strong>Arsip Pribadi Terenkripsi</strong>
                                <span>Simpan laporan secara pribadi tanpa meneruskannya ke pihak penanganan.</span>
                            </div>
                        </label>

                        <label class="choice">
                            <input type="radio" name="preferensi_tindak_lanjut" value="satgas_ppks">
                            <div>
                                <strong>Satgas PPKS Kampus</strong>
                                <span>Memilih jalur penanganan melalui Satgas PPKS kampus.</span>
                            </div>
                        </label>

                        <label class="choice">
                            <input type="radio" name="preferensi_tindak_lanjut" value="lbh">
                            <div>
                                <strong>LBH & Lembaga Bantuan Hukum</strong>
                                <span>Memilih jalur konsultasi atau bantuan hukum.</span>
                            </div>
                        </label>
                    </div>
                </section>

                <section class="card">
                    <h2 class="section-title">04. Penyimpanan & Pengiriman</h2>
                    <p class="section-desc">Periksa kembali informasi sebelum menyimpan atau mengirim laporan.</p>

                    <div class="button-area">
                        <button class="btn-draft" type="submit" name="aksi" value="draf">
                            Simpan sebagai Draf
                        </button>

                        <button class="btn-send" type="submit" name="aksi" value="kirim">
                            Kirim Laporan →
                        </button>
                    </div>
                </section>
            </form>
        </div>

        <aside>
            <section class="side-card">
                <h3>🛡 Perlindungan Privasi</h3>

                <div class="info-item">
                    <div class="info-icon">🔒</div>
                    <div>
                        <strong>Anonim Total</strong>
                        <p>Identitas pelapor tidak ditampilkan secara publik.</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">🔐</div>
                    <div>
                        <strong>Privasi Data</strong>
                        <p>Informasi laporan perlu dilindungi dan hanya dapat diakses pihak berwenang.</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">🤝</div>
                    <div>
                        <strong>Kontrol Pelapor</strong>
                        <p>Kamu dapat menentukan preferensi tindak lanjut laporan.</p>
                    </div>
                </div>
            </section>

            <section class="side-card help-card">
                <h3>Butuh Bantuan Segera?</h3>
                <p>Jika kamu berada dalam situasi yang membutuhkan pertolongan segera, hubungi orang tepercaya atau layanan bantuan yang sesuai.</p>
            </section>

            <section class="side-card">
                <h3>💗 Kamu Tidak Sendiri</h3>
                <p style="font-size:12px; line-height:1.7; color:#a77982;">
                    Setiap cerita layak didengar. Kamu berhak mendapatkan lingkungan yang aman dan bebas dari kekerasan.
                </p>
            </section>
        </aside>

    </div>
</main>
<script>
    document.getElementById('bukti').addEventListener('change', function () {
        const daftar = document.getElementById('daftar-file');

        daftar.innerHTML = '';

        Array.from(this.files).forEach(file => {
            const item = document.createElement('div');
            item.textContent = '📎 ' + file.name;
            daftar.appendChild(item);
        });
    });
</script>
</body>
</html>
