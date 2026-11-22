<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | PELITA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 20px;
            background: #ffffff;
            color: #252525;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 55px auto 30px;
            padding: 0 8px;
            text-align: center;
        }

        /* Logo */
        .logo img {
            width: 120px;
            height: auto;
            display: block;
            object-fit: contain;
            margin: 0 auto 10px;
        }

        /* Judul dan deskripsi */
        h2 {
            color: #792638;
            font-size: 20px;
            font-weight: 600;
            margin: 10px 0;
            text-align: center;
        }

        .description {
            color: #c13d56;
            font-size: 14px;
            margin: 0 0 25px;
            text-align: center;
        }

        /* Form */
        form {
            width: 100%;
            text-align: left;
        }

        .form-group {
            text-align: left;
            margin-bottom: 12px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 500;
            color: #252525;
        }

        input {
            display: block;
            width: 100%;
            padding: 10px 13px;
            border: none;
            border-radius: 7px;
            background: #fff0c9;
            font-size: 12px;
            outline-color: #a13d4b;
        }

        input::placeholder {
            color: #777777;
        }

        /* Pesan error dan berhasil */
        .error {
            color: #c0394b;
            font-size: 11px;
            margin-top: 5px;
        }

        .success {
            color: #287a46;
            font-size: 13px;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Tombol daftar */
        button {
            display: block;
            margin: 20px auto 15px;
            padding: 9px 25px;
            background: white;
            border: 1px solid #a13d4b;
            border-radius: 7px;
            color: #792638;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background: #a13d4b;
            color: white;
        }

        /* Link login */
        .login-link {
            margin-top: 15px;
            color: #c13d56;
            font-size: 13px;
            text-align: center;
        }

        .login-link a {
            color: #792638;
        }

        /* Footer */
        .footer {
            margin-top: 20px;
            font-size: 10px;
            color: #c13d56;
            text-align: center;
        }

        @media (max-width: 600px) {
            .container {
                margin-top: 30px;
            }

            .description {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="logo">
            <img src="{{ asset('images/logo-pelita.png') }}" alt="Logo PELITA">
        </div>

        <h2>Buat Akun PELITA Anda</h2>

        <p class="description">
            Ruang aman untuk pemulihan dan dukungan.
            Identitas Anda adalah prioritas kami.
        </p>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama atau Alias</label>
                <input
                    type="text"
                    name="name"
                    placeholder="Gunakan nama samaran jika perlu"
                    value="{{ old('name') }}"
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email / ID pengguna</label>
                <input
                    type="email"
                    name="email"
                    placeholder="@email.com"
                    value="{{ old('email') }}"
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Kata Sandi</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                >

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Kata Sandi</label>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Masukkan ulang kata sandi"
                >
            </div>

            <button type="submit">Daftar Sekarang →</button>
        </form>

        <p class="login-link">
            Sudah memiliki Akun?
            <a href="{{ url('/login') }}">Masuk</a>
        </p>

        <p class="footer">
            Dengan mendaftar, Anda menyetujui Ketentuan Privasi kami.
            Data Anda dienkripsi sepenuhnya.
        </p>

    </div>
</body>
</html>
