@extends('user.layouts.dashboard-user')

@section('isi')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="css/ubah_pw.css" />

    <div class="rectangle">
        <button class="rectangle-1"></button><span class="ubah-password">Ubah password</span>
        <div class="rectangle-2"></div>
        <span class="password-lama">Password lama</span>
        <div class="rectangle-3"></div>
        <div class="logo-smart-peamekasan"></div>
        <span class="password-baru">Password baru</span>
        <div class="rectangle-4"></div>
        <span class="konfirmasi-password-baru">Konfirmasi password baru</span>
        <div class="rectangle-5"></div>
        <button class="tombol-konfirmasi">
            <span class="simpan">Simpan</span>
            <div class="rectangle-6"></div>
        </button><button class="tombol-konfirmasi-7">
            <span class="batal">Batal</span>
            <div class="rectangle-8"></div>
        </button>
    </div>
@endsection
