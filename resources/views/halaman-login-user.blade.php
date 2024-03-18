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
    <div class="main-container">
        <div class="login-body">
            <button class="login-button">
                <span class="silape-text">SILAPE</span></button><span class="login-text">LOGIN</span>
            <div class="flex-row-c">
                <span class="username">Username</span>
                <input class="username-halaman-login-user" type="text">
                <span class="password">Password</span>
                <input class="password-input" type="password">
                <button class="login-button-1">
                    <span class="login-text-2">login</span>
                </button>
            </div>
            <a href="register_user"><span class="register-text">Register</span></a>
            <div class="flex-row">
                <div class="vector"></div>
                <span class="metode-lain">Metode lain</span>
                <div class="vector-3"></div>
            </div>
            <div class="flex-row-fa">
                <div class="flat-color-icons-google"></div>
                <div class="logos-facebook"></div>
                <div class="square-x-twitter">
                    <div class="vector-4"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
