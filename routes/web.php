<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})
;
// bagian user
Route::get('/biodata_user', function () {
    return view('user\biodata-user');
});

Route::get('/halaman_login_user', function () {
    return view('user\halaman-login-user');
});

Route::get('/register_user', function () {
    return view('user\register-user');
});

Route::get('/edit_user', function () {
    return view('user\edit-data-user');
});


Route::get('/dashboard_user', function () {
    return view('user\dashboard-user');
});

Route::get('/halaman-laporan', function () {
    return view('user\halaman-laporan');
});

Route::get('/ubah_pw', function () {
    return view('user\ubah_pw');
});
// bagian petugas
Route::get('/halaman_login_pa', function () {
    return view('pa\halaman-login-pa');
});

Route::get('/input_tanggapan', function () {
    return view('pa\halaman-input-tanggapan');
});

Route::get('/dashboard_petugas', function () {
    return view('pa\dashboard-pa');
});

Route::get('/biodata_petugas', function () {
    return view('pa\biodata_petugas');
});

// bagian admin
Route::get('/da_admin', function () {
    return view('pa\dashboard_admin');
});




