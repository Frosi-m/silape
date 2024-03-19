<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})
;
Route::get('/biodata_user', function () {
    return view('user\biodata-user');
});

Route::get('/halaman_login_user', function () {
    return view('user\halaman-login-user');
});

Route::get('/halaman_login_pa', function () {
    return view('pa\halaman-login-pa');
});

Route::get('/register_user', function () {
    return view('user\register-user');
});

