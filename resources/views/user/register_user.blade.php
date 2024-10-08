<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Generated by Codia AI</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <link rel="stylesheet" href="css\register_user.css" />
</head>

<body>
    <form action="{{ route('register_user') }}" method="post">
        <div class="main-container">
            <div class="rectangle">
                @csrf
                <div class="rectangle-1"><span class="silape">SILAPE</span></div>
                <span class="register">REGISTER</span>
                <span class="username-input">Email</span>
                <input class="rectangle-2" type="text" name="email" value="{{ old('email') }}">
                @error('email')
                    <small class="pesan">Email
                        harap diisi
                        dengan benar*</small>
                @enderror
                <span class="password-input">Password</span>
                <input class="rectangle-3" type="password" name="pass_u">
                @error('pass_u')
                    <small class="pesan">Password
                        harap diisi
                        dengan benar*</small>
                @enderror
                <span class="nama-input">Nama</span>
                <input class="main-content" type="text" name="nama" value="{{ old('nama') }}">
                @error('nama')
                    <small class="pesan">Username
                        harap diisi
                        dengan benar*</small>
                @enderror
                <span class="address-field">Alamat</span>
                <textarea class="rectangle-box-4" name="alamat">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <small class="pesan">Alamat
                        harap diisi
                        dengan benar*</small>
                @enderror
                <span class="no-telp">No telp</span>
                <input class="rectangle-5" type="number" name="tlp" value="{{ old('tlp') }}">
                @error('tlp')
                    <small class="pesan">No telp
                        harap diisi
                        dengan benar*</small>
                @enderror
                <br>
                <button class="rectangle-6">
                    <span class="buat-akun">Buat akun</span>
                </button>
                <span class="kembali">
                    <a href="halaman_login_user">Kembali</a>
                </span>
            </div>
        </div>
    </form>

    <!-- Generated by Codia AI - https://codia.ai/ -->
</body>

</html>
