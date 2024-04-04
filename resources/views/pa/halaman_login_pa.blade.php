<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman login pa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
    <link rel="stylesheet" href="css/background-logo.css" />
</head>

<body>
    <form action="{{route('autentikasi_pa')}}" method="post">
    @csrf
    <div class="main-container">
        <div class="rectangle">
            <div class="silape-halaman-login-petugas">
                <span class="silape">SILAPE</span>
            </div>
            <div class="logo-smart-peamekasan">
            </div>
            <button class="login-button">
                <span class="login-span">login</span>
            </button>
            <span class="username-span">Username</span>
            <input class="username-div" name="username" type="text">
            <span class="password-span">Password</span>
            <input class="password-halaman-petugas" name="password" type="password">
        </div>
    </div>
    </div>
    </form>
</body>

</html>
