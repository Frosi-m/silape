<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_user;
use App\Http\Controllers\controller_pa;
use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('welcome');
});

// bagian user

Route::middleware(['user_masuk'])->group(function () {
    Route::controller(controller_user::class)->group(function () {

        Route::get('/biodata_user', 'bio_user')->name('bio_user');
        Route::get('/edit_user', 'edit_user')->name('edit_user');
        Route::get('/dashboard_user', 'dashboard_user')->name('dashboard_untuk_user');
        Route::get('/halaman_laporan', 'halaman_laporan')->name('halaman_laporan');
        Route::get('/list_laporan', 'list_laporan')->name('list_laporan');
        Route::get('/detail_laporan/{data}', 'detail_laporan');
        Route::get('/ubah_pw', 'ubah_pw')->name('ubah_pw');
        Route::get('/logout_user', 'logout_user')->name('logout_untuk_user');
        Route::get('/dashboard_user/tambah_laporan', 'tambah_laporan');

        
        
        Route::post('/ubah_data_diri', 'proses_edit_user')->name('proses_edit');
        Route::post('/dashboard_user/tambah_laporan', 'tambah_laporan')->name('tambah_laporan');
    });
});

Route::get('/halaman_login_user', function () {
    return view('user/halaman_login_user');
})->name('halaman_login_user');

Route::get('/register_user', function () {
    return view('user/register_user');
});
Route::post('/tambah_akun_user', [controller_user::class, 'tambah_user'])->name('register_user');
Route::post('/proses_login_user', [controller_user::class,'proses_login_user'])->name('autentikasi');

Route::controller(controller_pa::class)->group(function () {

    Route::post('/proses_login_pa', 'proses_login_pa')->name('autentikasi_pa');
    // bagian admin
    Route::get('/da_admin', 'da_admin')->name('da_admin');
    Route::get('/manajemen_akun', 'manajemen_akun')->name('manajemen_akun');
    Route::get('/manajemen_laporan', 'manajemen_laporan')->name('manajemen_laporan');
    Route::get('/register_petugas', 'register_akun')->name('register_akun');
    Route::get('/status_pelaporan', 'data_laporan')->name('data_laporan');
    Route::get('/total_laporan', 'total_laporan')->name('total_laporan');
    Route::get('/detail_total_laporan', 'detail_tp')->name('detail_t_p');
    Route::get('/detail_status_laporan', 'detail_sp')->name('detail_s_p');
    Route::get('/edit_petugas/{p}', 'edit_petugas');
    Route::get('/konfirmasi_laporan/{p}', 'laporan_konfirmasi');
    Route::get('/tolak_laporan/{p}', 'laporan_ditolak')->name('tolak_laporan');
    Route::get('/terima_laporan/{p}', 'laporan_diterima')->name('konfirmasi_laporan');
    Route::get('/hapus_petugas/{p}', 'hapus_akun');

    Route::post('/tambah_petugas', 'tambah_akun')->name('tambah_akun');
    Route::post('/proses_edit_akun', 'proses_edit_akun')->name('edit_pa');

    // petugas

    Route::get('/data_tanggapan', 'data_tanggapan')->name('data_tanggapan');
    Route::get('/list_lp', 'list_laporan')->name('list_lp');
    Route::get('/input_tanggapan/{s}', 'input_tanggapan')->name('input_tanggapan');
    Route::get('/dashboard_petugas', 'dashboard_petugas')->name('dashboard_petugas');
    Route::get('/biodata_petugas', 'biodata_petugas')->name('biodata_petugas');
    Route::get('/logout_pa', 'logout_pa')->name('logout_untuk_pa');

    Route::post('/p_lp', 'proses_tanggapan')->name('proses_tanggapan');
});

Route::get('/halaman_login_pa', function () {
    return view('pa/halaman_login_pa');
})->name('halaman_login_pa');

Route::get('/coba', function(){
    $sekarang = Carbon::now();

    echo $sekarang->format('d/m/Y');
});
