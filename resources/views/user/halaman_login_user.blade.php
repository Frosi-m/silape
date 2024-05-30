<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman login user</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="css\halaman-login-user.css">
</head>

<body>
    <form action="{{ route('autentikasi') }}" method="post">
        @csrf
        <div class="main-container">
            <div class="login-body">
                <button class="login-button">
                    <span class="silape-text">SILAPE</span></button><span class="login-text">LOGIN</span>
                <div class="flex-row-c">
                    <span class="username">Email</span>
                    <input class="username-halaman-login-user" type="text" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Username
                            harap diisi
                            dengan benar*</small>
                    @enderror
                    <span class="password">Password</span>
                    <input class="password-input" type="password" name="password">
                    @error('password')
                        <small style="color: red;font-style: italic; position: absolute; top: 195px; left: 38px;">password
                            harap
                            diisi
                            dengan benar*</small>
                    @enderror
                    <button class="login-button-1">
                        <span class="login-text-2">login</span>
                    </button>
                </div>
                <span class="register-text">
                    <a href="register_user">Register</a>
                </span>
                <div class="flex-row">
                    <div class="vector"></div>
                    <span class="metode-lain">Metode lain</span>
                    <div class="vector-3"></div>
                </div>
                <div class="flex-row-fa">
                    <a href="{{ route('oauth.google') }}">
                        <div class="flat-color-icons-google"></div>
                    </a>
                    <div class="logos-facebook"></div>
                    <div class="square-x-twitter">
                        <div class="vector-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
