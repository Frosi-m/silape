@extends('user.layouts.dashboard-user')

@section('isi')
    <form action="{{ route('p_ubah_pw') }}" method="post">
        @csrf
        <div class="rectangle">
            <button class="rectangle-1"></button><span class="ubah-password">Ubah password</span>
            <div class="logo-smart-peamekasan"></div>
            <span class="password-baru">Password baru</span>
            <input type="password" class="rectangle-4" name="pw_baru">
            <span class="konfirmasi-password-baru">Konfirmasi password baru</span>
            <input type="password" class="rectangle-5" name="pw_konfirmasi">

            <button class="tombol-konfirmasi">
                <span class="simpan">Simpan</span>
                <div class="rectangle-6"></div>
            </button>

            <a class="tombol-konfirmasi-7" href='{{ route('dashboard_untuk_user') }}'>
                <span class="batal">Batal</span>
                <div class="rectangle-8"></div>
            </a>
        </div>
    </form>
@endsection
