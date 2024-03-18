<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halaman_login_user', function () {
    return view('halaman-login-user');
});
