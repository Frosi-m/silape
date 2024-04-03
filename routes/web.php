<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_user;
use App\Http\Controllers\controller_pa;

Route::get('/', function () {
    return view('welcome');
})
;
// bagian user
Route::controller(controller_user::class)->group(function(){

    Route::get('/biodata_user', 'bio_user')->name('bio_user');
    Route::get('/edit_user', 'edit_user')->name('edit_user');
    Route::get('/dashboard_user', 'dashboard_user')->name('dashboard_untuk_user');
    Route::get('/halaman_laporan', 'halaman_laporan')->name('halaman_laporan');
    Route::get('/ubah_pw', 'ubah_pw')->name('ubah_pw');
    Route::get('/logout_user', 'logout_user')->name('logout_untuk_user');

    Route::post('/proses_login_user', 'proses_login_user')->name('autentikasi');
})->middleware('auth');

Route::get('/halaman_login_user', function(){
    return view('user/halaman_login_user');
})->name('halaman_login_user')->middleware('guest');

Route::get('/register_user', function(){
    return view('user/register_user');
})->middleware('guest');

// bagian admin
Route::controller(controller_pa::class)->group(function(){

    Route::get('/da_admin', 'da_admin')->name('da_admin');
    Route::get('/manajemen_akun', 'manajemen_akun')->name('manajemen_akun');
    Route::get('/manajemen_laporan', 'manajemen_laporan')->name('manajemen_laporan');
    Route::get('/register_petugas', 'register_akun')->name('register_akun');
    Route::get('/data_pelaporan', 'data_laporan')->name('data_laporan');

    // petugas
    Route::get('/halaman_login_pa', 'halaman_login_pa')->name('halaman_login_pa');
    Route::get('/data_tanggapan', 'data_tanggapan')->name('data_tanggapan');
    Route::get('/input_tanggapan', 'input_tanggapan')->name('input_tanggapan');
    Route::get('/dashboard_petugas', 'dashboard_petugas')->name('dashboard_petugas');
    Route::get('/biodata_petugas', 'biodata_petugas')->name('biodata_petugas');

    Route::post('/proses_login_pa', 'proses_login_pa')->name('autentikasi_pa');
});

