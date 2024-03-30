@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <link rel="stylesheet" href="css\register_petugas.css" />
    <div class="rectangle">
        <div class="rectangle-1"><span class="silape">SILAPE</span></div>
        <span class="register">REGISTER</span>
        <span class="username-input">Username</span>
        <input class="rectangle-2" type="text">
        <span class="password-input">Password</span>
        <input class="rectangle-3" type="password">
        <span class="nama-input">Nama</span>
        <input class="main-content" type="text">
        <span class="email-field">Jabatan</span>
        <select class="rectangle-box">
            <option value="">a</option>
            <option value="">b</option>
            <option value="">c</option>
        </select>
        <span class="address-field">Alamat</span>
        <textarea class="rectangle-box-4"></textarea>
        <span class="no-telp">No telp</span>
        <input class="rectangle-5" type="number">
        <button class="rectangle-6">
            <span class="buat-akun">Buat akun</span>
        </button>
        <span class="kembali">
            <a href="halaman_login_user">Kembali</a>
        </span>
    </div>
@endsection
