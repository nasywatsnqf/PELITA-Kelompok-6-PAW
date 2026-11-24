<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil | PELITA</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #fff;
            color: #4b1725;
        }

        .edit-container {
            width: min(980px, 92%);
            margin: 30px auto 60px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 20px;
            color: #a13d58;
            text-decoration: none;
            font-size: 13px;
        }

        .back-icon {
            width: 27px;
            height: 27px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #f7eee5;
        }

        .page-heading { margin-bottom: 22px; }
        .page-heading h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            color: #701d32;
            margin-bottom: 4px;
        }
        .page-heading p {
            max-width: 610px;
            color: #806f73;
            font-size: 12px;
            line-height: 1.6;
        }

        .edit-layout {
            display: grid;
            grid-template-columns: 260px minmax(0, 1fr);
            gap: 18px;
            align-items: start;
        }

        .side-card, .form-card {
            background: #fff;
            border-radius: 13px;
            box-shadow: 0 3px 18px rgba(0,0,0,.045);
        }
        .side-card { padding: 26px 18px; margin-bottom: 14px; text-align: center; }
        .avatar-wrap {
            width: 116px;
            height: 116px;
            position: relative;
            margin: 0 auto 13px;
            border: 5px solid #f1e5db;
            border-radius: 50%;
            background: #f7eee5;
            display: grid;
            place-items: center;
            overflow: visible;
        }
        .avatar-wrap img {
    position: absolute;
    inset: 5px;
    width: calc(100% - 10px);
    height: calc(100% - 10px);
    object-fit: cover;
    border-radius: 50%;
    z-index: 1;
}
        .avatar-placeholder {
    position: absolute;
    inset: 5px;
    display: grid;
    place-items: center;
    z-index: 0;
}
        .avatar-placeholder svg { width: 88px; height: 88px; color: #701d32; }
        .avatar-upload {
            position: absolute;
            right: -5px;
            bottom: -3px;
            width: 31px;
            height: 31px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #701d32;
            color: white;
            border: 2px solid white;
            cursor: pointer;
            z-index: 2;
        }
        .avatar-upload svg { width: 15px; height: 15px; }
        .avatar-caption { color: #806f73; font-size: 10px; }
        .file-error { margin-top: 8px; text-align: center; }

        .account-card {
            padding: 16px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 3px 18px rgba(0,0,0,.045);
        }
        .account-label { color: #806f73; font-size: 10px; margin-bottom: 5px; }
        .account-email {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            padding: 10px;
            border-radius: 8px;
            background: #fbf1e7;
            color: #701d32;
            font-size: 10px;
            overflow-wrap: anywhere;
        }
        .account-email svg { width: 15px; height: 15px; flex-shrink: 0; }

        .form-card { padding: 27px 30px; }
        .form-title {
            color: #701d32;
            font-family: 'Poppins', sans-serif;
            font-size: 17px;
            margin-bottom: 3px;
        }
        .form-subtitle { color: #806f73; font-size: 10px; margin-bottom: 23px; line-height: 1.5; }

        .form-group { margin-bottom: 16px; }
        .label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 7px;
        }
        .form-group label, .label-row label {
            color: #701d32;
            font-size: 11px;
            font-weight: 600;
        }
        .field-hint { color: #b43f5b; font-size: 9px; }
        .form-control {
            width: 100%;
            height: 40px;
            padding: 0 12px;
            border: 1px solid transparent;
            border-radius: 9px;
            outline: none;
            background: #fbf1e7;
            color: #4b1725;
            font-family: inherit;
            font-size: 11px;
        }
        .form-control:focus { border-color: #b76a7d; }
        .form-control::placeholder { color: #9a858a; }
        .field-description { color: #806f73; font-size: 9px; line-height: 1.5; margin-top: 6px; }
        .error-message { color: #c62828; font-size: 10px; margin-top: 5px; }

        .section-title {
            margin: 22px 0 4px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            color: #792638;
        }
        .section-description { color: #927d83; font-size: 10px; margin-bottom: 13px; line-height: 1.5; }
        .two-columns { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            border-top: 1px solid #f1e8e6;
            margin-top: 22px;
            padding-top: 20px;
        }
        .btn {
            min-height: 39px;
            padding: 0 20px;
            border: 0;
            border-radius: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-cancel { color: #a13d58; background: #f7eee5; }
        .btn-save { color: white; background: #701d32; box-shadow: 0 3px 9px rgba(112,29,50,.18); }
        .btn svg { width: 14px; height: 14px; }

        @media (max-width: 700px) {
            .edit-container { margin-top: 22px; }
            .edit-layout { grid-template-columns: 1fr; }
            .side-column { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; align-items: center; }
            .side-card { margin-bottom: 0; height: 100%; display: flex; flex-direction: column; justify-content: center; }
            .form-card { padding: 22px 18px; }
        }
        @media (max-width: 480px) {
            .side-column { grid-template-columns: 1fr; }
            .two-columns { grid-template-columns: 1fr; gap: 0; }
            .page-heading h1 { font-size: 19px; }
            .form-footer { flex-direction: column-reverse; }
            .form-footer .btn { width: 100%; }
        }
    </style>
</head>
<body>

    @include('components.navbar')

    <main class="edit-container">
        <a href="{{ route('profil') }}" class="back-link">
            <span class="back-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
            </span>
            Kembali ke Profil
        </a>

        <header class="page-heading">
            <h1>Pengaturan Identitas & Profil Samaran</h1>
            <p>Kelola informasi profil dan kontak darurat yang ingin kamu gunakan di PELITA.</p>
        </header>

        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="edit-layout">
                <aside class="side-column">
                    <section class="side-card">
                        <div class="avatar-wrap">
                            <img
                                id="avatar-preview"
                                src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : '' }}"
                                alt="Foto profil"
                                style="{{ $user->profile_photo ? '' : 'display:none;' }}"
                            >
                            <div class="avatar-placeholder" id="avatar-placeholder" style="{{ $user->profile_photo ? 'display:none;' : '' }}">
                                <svg viewBox="0 0 100 100" fill="none" aria-hidden="true">
                                    <circle cx="50" cy="50" r="44" fill="#F7EEE5" stroke="currentColor" stroke-width="7"/>
                                    <circle cx="50" cy="36" r="14" fill="currentColor"/>
                                    <path d="M20 78c3-17 14-26 30-26s27 9 30 26" fill="currentColor"/>
                                </svg>
                            </div>
                            <label for="profile_photo" class="avatar-upload" title="Unggah foto profil">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"/>
                                </svg>
                            </label>
                        </div>
                        <input type="file" name="profile_photo" id="profile_photo" accept="image/png,image/jpeg,image/webp" hidden>
                        <p class="avatar-caption">Ganti Foto Profil</p>
                        <p class="field-description">JPG, PNG, atau WEBP. Maksimal 2 MB.</p>
                        @error('profile_photo')
                            <p class="error-message file-error">{{ $message }}</p>
                        @enderror
                    </section>

                    <section class="account-card">
                        <p class="account-label">Email Akun</p>
                        <div class="account-email">
                            <strong>{{ $user->email }}</strong>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="4" y="10" width="16" height="11" rx="2"/>
                                <path d="M8 10V7a4 4 0 1 1 8 0v3"/>
                            </svg>
                        </div>
                    </section>
                </aside>

                <section class="form-card">
                    <h2 class="form-title">Ubah Rincian Profil</h2>
                    <p class="form-subtitle">Perbarui nama, email, dan informasi kontak darurat kamu.</p>

                    <div class="form-group">
                        <div class="label-row">
                            <label for="name">Nama Samaran / Alias</label>
                            <span class="field-hint">✦ Nama yang ditampilkan</span>
                        </div>
                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama samaran" required>
                        @error('name') <p class="error-message">{{ $message }}</p> @enderror
                        <p class="field-description">Nama ini akan ditampilkan pada profil kamu di PELITA.</p>
                    </div>

                    <div class="form-group">
                        <div class="label-row">
                            <label for="email">Email Akun</label>
                            <span class="field-hint">✉ Email untuk login</span>
                        </div>
                        <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan alamat email" required>
                        @error('email') <p class="error-message">{{ $message }}</p> @enderror
                        <p class="field-description">Email ini digunakan untuk masuk ke akun PELITA.</p>
                    </div>

                    <h3 class="section-title">Kontak Darurat</h3>
                    <p class="section-description">Tambahkan orang tepercaya yang dapat dihubungi saat keadaan darurat. Bagian ini boleh dikosongkan.</p>

                    <div class="form-group">
                        <label for="emergency_contact_name">Nama Kontak Darurat</label>
                        <input class="form-control" type="text" id="emergency_contact_name" name="emergency_contact_name" value="{{ old('emergency_contact_name', $user->emergency_contact_name) }}" placeholder="Masukkan nama lengkap">
                        @error('emergency_contact_name') <p class="error-message">{{ $message }}</p> @enderror
                    </div>

                    <div class="two-columns">
                        <div class="form-group">
                            <label for="emergency_contact_relation">Hubungan</label>
                            <input class="form-control" type="text" id="emergency_contact_relation" name="emergency_contact_relation" value="{{ old('emergency_contact_relation', $user->emergency_contact_relation) }}" placeholder="Contoh: Orang tua">
                            @error('emergency_contact_relation') <p class="error-message">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label for="emergency_contact_phone">Nomor Telepon</label>
                            <input class="form-control" type="tel" id="emergency_contact_phone" name="emergency_contact_phone" value="{{ old('emergency_contact_phone', $user->emergency_contact_phone) }}" placeholder="Contoh: 0812 3456 7890">
                            @error('emergency_contact_phone') <p class="error-message">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-footer">
                        <a href="{{ route('profil') }}" class="btn btn-cancel">Batalkan</a>
                        <button type="submit" class="btn btn-save">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m5 12 4 4L19 6"/>
                            </svg>
                            Simpan Perubahan Profil
                        </button>
                    </div>
                </section>
            </div>
        </form>
    </main>

    <script>
        const photoInput = document.getElementById('profile_photo');
        const photoPreview = document.getElementById('avatar-preview');
        const avatarPlaceholder = document.getElementById('avatar-placeholder');

        photoInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (!file) return;

            if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) {
                alert('Pilih foto dengan format JPG, PNG, atau WEBP.');
                photoInput.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran foto maksimal 2 MB.');
                photoInput.value = '';
                return;
            }

            photoPreview.src = URL.createObjectURL(file);
            photoPreview.style.display = 'block';
            avatarPlaceholder.style.display = 'none';
        });
    </script>
</body>
</html>
