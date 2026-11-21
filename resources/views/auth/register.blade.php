
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | PELITA</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            background: #f7f5f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 25px;
            color: #263044;
        }

        .container {
            background: white;
            width: 100%;
            max-width: 780px;
            padding: 40px 55px;
            border-radius: 12px;
            text-align: center;
        }

        .logo {
            color: #a13d4b;
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        h2 {
            color: #792638;
            margin: 10px 0;
        }

        .description {
            color: #c13d56;
            margin-bottom: 25px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 7px;
            background: #fff0c9;
            outline-color: #a13d4b;
        }

        .error {
            color: #c0394b;
            font-size: 13px;
            margin-top: 5px;
        }

        .success {
            color: #287a46;
            margin-bottom: 15px;
        }

        button {
            margin-top: 15px;
            padding: 11px 30px;
            background: white;
            border: 1px solid #a13d4b;
            border-radius: 7px;
            color: #792638;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #a13d4b;
            color: white;
        }

        .login-link {
            margin-top: 20px;
            color: #c13d56;
        }

        .login-link a {
            color: #792638;
        }

        .footer {
            margin-top: 25px;
            font-size: 11px;
            color: #c13d56;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="logo">Pelita</div>

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
                <input type="text" name="name"
                    placeholder="Gunakan nama samaran jika perlu"
                    value="{{ old('name') }}">

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email / ID pengguna</label>
                <input type="email" name="email"
                    placeholder="@email.com"
                    value="{{ old('email') }}">

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password"
                    placeholder="Minimal 8 karakter">

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation"
                    placeholder="Masukkan ulang kata sandi">
            </div>

            <button type="submit">Daftar Sekarang →</button>
        </form>

        <p class="login-link">
            Sudah memiliki Akun? <a href="#">Masuk</a>
        </p>

        <p class="footer">
            Dengan mendaftar, Anda menyetujui Ketentuan Privasi kami.
            Data Anda dienkripsi sepenuhnya.
        </p>

    </div>
</body>
</html>