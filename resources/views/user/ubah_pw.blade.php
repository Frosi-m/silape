@extends('user.layouts.dashboard-user')

@section('isi')
    {{-- <form action="{{ route('p_ubah_pw') }}" method="post"> --}}
    @csrf
    <div class="rectangle">
        <button class="rectangle-1"></button><span class="ubah-password">Ubah password</span>
        <span class="password-lama">Password lama</span>
        <input type="password" class="rectangle-3" name="pw_lama">
        <div class="logo-smart-peamekasan"></div>
        <span class="password-baru">Password baru</span>
        <input type="password" class="rectangle-4" name="pw_baru">
        <span class="konfirmasi-password-baru">Konfirmasi password baru</span>
        <input type="password" class="rectangle-5" name="pw_konfirmasi">
        <button class="tombol-konfirmasi">
            <span class="simpan">Simpan</span>
            <div class="rectangle-6"></div>
        </button>
        <button class="tombol-konfirmasi-7">
            <span class="batal">Batal</span>
            <div class="rectangle-8"></div>
        </button>
    </div>
    </form>
@endsection
