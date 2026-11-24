<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | PELITA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #fff;
            color: #3e3032;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .container {
            width: min(800px, calc(100% - 40px));
            margin: 24px auto 45px;
        }

        /* Banner profil */
        .profile-banner {
            min-height: 167px;
            padding: 24px 26px;
            display: flex;
            align-items: center;
            gap: 20px;
            border-radius: 12px;
            background:
                radial-gradient(circle at 5% 100%, #a83c57 0, transparent 27%),
                radial-gradient(circle at 96% 80%, #702238 0, transparent 30%),
                #fffafa;
            box-shadow: 0 3px 15px #00000008;
        }

        .avatar-wrap {
            position: relative;
            width: 78px;
            height: 78px;
            min-width: 78px;
        }

        .profile-avatar {
            width: 78px;
            height: 78px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 6px solid #f9e7dc;
            border-radius: 50%;
            background: #f8e8e8;
            color: #a83c57;
        }

        .profile-avatar svg {
            width: 56px;
            height: 56px;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .avatar-shield {
            position: absolute;
            right: -4px;
            bottom: 1px;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fffafa;
            border-radius: 50%;
            background: #792638;
            color: #fff;
        }

        .avatar-shield svg {
            width: 13px;
            height: 13px;
        }

        .profile-info {
            flex: 1;
            min-width: 0;
        }

        .profile-info h2 {
            margin: 0 0 4px;
            color: #792638;
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
        }

        .profile-info .email {
            margin-bottom: 9px;
            color: #957b80;
            font-size: 10px;
        }

        .profile-info .description {
            max-width: 390px;
            margin: 0;
            font-size: 11px;
            line-height: 1.6;
        }

        .edit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 20px;
            border-radius: 24px;
            background: #fff4e7;
            color: #792638;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: background .2s ease;
        }

        .edit-button:hover {
            background: #ffe0c5;
        }

        .edit-button svg {
            width: 13px;
            height: 13px;
        }

        /* Kolom konten */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-top: 24px;
            align-items: start;
        }

        .card {
            margin-bottom: 14px;
            padding: 17px 18px;
            border-radius: 13px;
            background: #fff;
            box-shadow: 0 3px 18px #00000008;
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 4px;
        }

        .card-icon {
            width: 30px;
            height: 30px;
            min-width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #fde7eb;
            color: #a13d58;
        }

        .card-icon svg {
            width: 17px;
            height: 17px;
        }

        .card-heading h3 {
            margin: 0;
            color: #792638;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
        }

        .card-description {
            margin: 0 0 12px 38px;
            color: #846e72;
            font-size: 9px;
            line-height: 1.5;
        }

        /* Kontak darurat */
        .empty-state {
            min-height: 94px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-bottom: 13px;
            padding: 15px;
            border-radius: 10px;
            background: #fbf1e7;
            color: #792638;
            text-align: center;
        }

        .empty-state svg {
            width: 21px;
            height: 21px;
        }

        .empty-state h4 {
            margin: 0;
            font-size: 10px;
            font-weight: 600;
        }

        .contact-state {
            min-height: 94px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 13px;
            padding: 15px;
            border-radius: 10px;
            background: #fbf1e7;
        }

        .contact-avatar {
            width: 40px;
            height: 40px;
            min-width: 40px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #f8e1e5;
            color: #792638;
        }

        .contact-avatar svg {
            width: 21px;
            height: 21px;
        }

        .contact-details {
            min-width: 0;
            flex: 1;
        }

        .contact-details h4 {
            margin: 0 0 3px;
            color: #792638;
            font-size: 11px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .contact-details p {
            margin: 0 0 3px;
            color: #846e72;
            font-size: 9px;
        }

        .contact-details a {
            color: #a13d58;
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
        }

        .contact-saved {
            align-self: flex-start;
            padding: 4px 7px;
            border-radius: 12px;
            background: #f3e4df;
            color: #792638;
            font-size: 8px;
            white-space: nowrap;
        }

        .card-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .small-text {
            color: #a08b90;
            font-size: 9px;
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 8px 12px;
            border-radius: 22px;
            background: #792638;
            color: #fff;
            font-size: 9px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .primary-button svg {
            width: 12px;
            height: 12px;
        }

        /* Aktivitas */
        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin: 1px 0 12px;
            padding: 0 3px;
        }

        .section-heading h3 {
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0;
            color: #a13d58;
            font-size: 9px;
            font-weight: 700;
        }

        .section-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #b53c58;
        }

        .section-heading span {
            color: #846e72;
            font-size: 8px;
            white-space: nowrap;
        }

        .activity-card-heading {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }

        .activity-card-heading .card-icon,
        .help-card-heading .card-icon {
            background: #f6efe6;
        }

        .activity-card-heading h3,
        .help-card-heading h3 {
            margin: 0;
            color: #792638;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 600;
        }

        .activity-card-heading p,
        .help-card-heading p {
            margin: 2px 0 0;
            color: #846e72;
            font-size: 9px;
        }

        .text-link {
            margin-left: auto;
            color: #a13d58;
            font-size: 8px;
            text-decoration: none;
            white-space: nowrap;
        }

        .activity-summary {
            min-height: 122px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 16px;
            border-radius: 10px;
            background: #fff6e9;
            text-align: center;
        }

        .activity-summary svg {
            width: 25px;
            height: 25px;
            margin-bottom: 9px;
            color: #792638;
        }

        .activity-summary h4 {
            margin: 0 0 5px;
            color: #792638;
            font-size: 10px;
            font-weight: 600;
        }

        .activity-summary p {
            max-width: 205px;
            margin: 0;
            color: #957d83;
            font-size: 8px;
            line-height: 1.6;
        }

        /* Pusat bantuan */
        .help-card-heading {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }

        .help-list {
            margin-top: 4px;
        }

        .help-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 0;
            border-bottom: 1px solid #f3e8e3;
            color: #514348;
            font-size: 9px;
        }

        .help-item:last-child {
            border-bottom: none;
            padding-bottom: 2px;
        }

        .help-item .help-icon {
            width: 14px;
            height: 14px;
            min-width: 14px;
            color: #b43f5b;
        }

        .help-item .chevron {
            width: 12px;
            height: 12px;
            margin-left: auto;
            color: #c58b96;
        }

        /* Tombol pengaturan akun */
        .account-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 12px;
            padding-top: 14px;
            border-top: 1px solid #f3e8e3;
        }

        .account-actions form {
            margin: 0;
        }

        .account-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            min-height: 32px;
            padding: 7px 12px;
            border: 1px solid transparent;
            border-radius: 20px;
            font-family: inherit;
            font-size: 9px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s ease;
        }

        .account-button svg {
            width: 12px;
            height: 12px;
        }

        .delete-button {
            background: #f7eee4;
            color: #a13d58;
        }

        .delete-button:hover {
            background: #f1e1d2;
        }

        .logout-button {
            border-color: #eee5e3;
            background: #fff;
            color: #792638;
        }

        .logout-button:hover {
            background: #fbf5f3;
        }

        @media (max-width: 680px) {
            .container {
                width: min(100% - 28px, 480px);
                margin-top: 18px;
            }

            .profile-banner {
                flex-wrap: wrap;
                gap: 14px;
                padding: 20px;
            }

            .profile-info {
                flex: 1 1 calc(100% - 95px);
            }

            .profile-info .description {
                max-width: none;
            }

            .edit-button {
                margin-left: 92px;
            }

            .content-grid {
                grid-template-columns: 1fr;
                gap: 4px;
                margin-top: 18px;
            }
        }

        @media (max-width: 420px) {
            .card-bottom {
                align-items: flex-start;
                flex-direction: column;
            }

            .account-actions {
                justify-content: flex-start;
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>

    @include('components.navbar')

    <main class="container">

        <!-- Banner Profil -->
        <section class="profile-banner">
            <div class="avatar-wrap">
                <div class="profile-avatar">
                    @if ($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Foto profil {{ $user->name }}">
                    @else
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <circle cx="32" cy="32" r="27" stroke="currentColor" stroke-width="5"/>
                            <circle cx="32" cy="24" r="9" fill="currentColor"/>
                            <path d="M14 49c2.8-9 9.2-13.5 18-13.5S47.2 40 50 49" fill="currentColor"/>
                        </svg>
                    @endif
                </div>
                <span class="avatar-shield" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </span>
            </div>

            <div class="profile-info">
                <h2>{{ $user->name }}</h2>
                <div class="email">{{ $user->email }}</div>
                <p class="description">
                    Ruang pemulihan Anda diproteksi dengan keamanan berlapis.
                    Semua catatan emosional dan data kontak tersimpan secara anonim.
                </p>
            </div>

            <a href="{{ route('profil.edit') }}" class="edit-button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m16 4 4 4L8 20H4v-4L16 4z"/>
                    <path d="m14 6 4 4"/>
                </svg>
                Edit Profil
            </a>
        </section>

        <!-- Dua Kolom Konten -->
        <section class="content-grid">

            <!-- Kontak Darurat -->
            <div class="card">
                <div class="card-heading">
                    <span class="card-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <circle cx="9" cy="11" r="2"/>
                            <path d="M6 16c.8-1.5 1.8-2.2 3-2.2s2.2.7 3 2.2M15 10h3M15 14h3"/>
                        </svg>
                    </span>
                    <h3>Kontak Darurat</h3>
                </div>

                <p class="card-description">
                    Penerima sinyal otomatis saat memicu Keluar Cepat / SOS
                </p>

                @if ($user->emergency_contact_name || $user->emergency_contact_relation || $user->emergency_contact_phone)
                    <div class="contact-state">
                        <div class="contact-avatar" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="7" r="3.5"/>
                                <path d="M4.5 20c.7-4.1 3.2-6.2 7.5-6.2s6.8 2.1 7.5 6.2"/>
                            </svg>
                        </div>
                        <div class="contact-details">
                            <h4>{{ $user->emergency_contact_name ?: 'Kontak Darurat' }}</h4>
                            @if ($user->emergency_contact_relation)
                                <p>{{ $user->emergency_contact_relation }}</p>
                            @endif
                            @if ($user->emergency_contact_phone)
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $user->emergency_contact_phone) }}">
                                    {{ $user->emergency_contact_phone }}
                                </a>
                            @else
                                <p>Nomor telepon belum ditambahkan</p>
                            @endif
                        </div>
                        <span class="contact-saved">Tersimpan</span>
                    </div>
                @else
                    <div class="empty-state">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="9" cy="7" r="3"/>
                            <path d="M3.5 19c.5-3.5 2.4-5.5 5.5-5.5 1.4 0 2.6.4 3.5 1.2M16 14l5 5m0-5-5 5"/>
                        </svg>
                        <h4>Belum ada kontak darurat</h4>
                    </div>
                @endif

                <div class="card-bottom">
                    <span class="small-text">Maks. 3 Kontak</span>
                    <a href="{{ route('profil.edit') }}" class="primary-button">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="9" cy="8" r="3"/>
                            <path d="M3 20c.5-3.5 2.5-5 6-5 1.4 0 2.5.3 3.4.8M19 8v6m-3-3h6"/>
                        </svg>
                        {{ ($user->emergency_contact_name || $user->emergency_contact_phone) ? 'Ubah kontak darurat' : 'Tambahkan kontak darurat' }}
                    </a>
                </div>
            </div>

            <!-- Aktivitas dan Layanan -->
            <div>
                <div class="section-heading">
                    <h3><span class="section-dot"></span> AKTIVITAS & LAYANAN SAYA</h3>
                    <span>Bulan Ini</span>
                </div>

                <div class="card">
                    <div class="activity-card-heading">
                        <span class="card-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 20c-5 0-8-3-8-7 4 0 7 2 8 7z"/>
                                <path d="M12 20c0-6 2-10 7-12 1 5-1 10-7 12z"/>
                                <path d="M12 20V8"/>
                            </svg>
                        </span>
                        <div>
                            <h3>Ringkasan Ruang Aman</h3>
                            <p>Kemajuan perjalanan ketenangan diri Anda</p>
                        </div>
                        <a href="#" class="text-link">Buka Catatan →</a>
                    </div>

                    <div class="activity-summary">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 10.5 6.5 4h11L20 10.5"/>
                            <path d="M3 10.5h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <path d="M9 14h6"/>
                        </svg>
                        <h4>Belum ada aktivitas</h4>
                        <p>
                            Setelah menggunakan fitur PELITA, aktivitas Anda akan muncul di sini.
                        </p>
                    </div>
                </div>

                <!-- Pusat Bantuan -->
                <div class="card">
                    <div class="help-card-heading">
                        <span class="card-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 13v-2a8 8 0 0 1 16 0v2"/>
                                <path d="M4 13h3v6H6a2 2 0 0 1-2-2zM20 13h-3v6h1a2 2 0 0 0 2-2z"/>
                                <path d="M17 19c-.8 1.2-2.2 2-4 2h-1"/>
                            </svg>
                        </span>
                        <div>
                            <h3>Pusat Bantuan & Regulasi Ruang Aman</h3>
                            <p>Transparansi dan pendampingan 24/7</p>
                        </div>
                    </div>

                    <div class="help-list">
                        <div class="help-item">
                            <svg class="help-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                            <span>Protokol Privasi & Perlindungan Korban</span>
                            <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
                        </div>

                        <div class="help-item">
                            <svg class="help-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m14 4 6 6M4 20l6-6M9 3l12 12M3 9l12 12"/>
                                <path d="m5 5 4-4M15 19l4 4"/>
                            </svg>
                            <span>Ketentuan Layanan & Batasan Hukum Pelaporan</span>
                            <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
                        </div>

                        <div class="help-item">
                            <svg class="help-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8z"/>
                            </svg>
                            <span>Hubungi Petugas Krisis / Satgas Kampus</span>
                            <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tombol Pengaturan Akun -->
        <section class="account-actions" aria-label="Pengaturan akun">
            <form action="{{ route('profil.destroy') }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun secara permanen? Tindakan ini tidak dapat dibatalkan.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="account-button delete-button">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6"/>
                        <path d="M10 11v5M14 11v5"/>
                    </svg>
                    Hapus Akun
                </button>
            </form>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="account-button logout-button">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M10 17l5-5-5-5M15 12H3"/>
                        <path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>
                    </svg>
                    Keluar Akun
                </button>
            </form>
        </section>

    </main>
</body>
</html>