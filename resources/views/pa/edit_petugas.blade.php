@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <link rel="stylesheet" href="..\css\register_petugas.css" />
    <div class="rectangle">
        <form action="{{ route('edit_pa') }}" method="post">
            @csrf
            @foreach ($data_pa as $data)
                <input type="hidden" value="{{ $data->id }}" name="kunci">
                <div class="rectangle-1"><span class="silape">SILAPE</span></div>
                <span class="register">Edit akun</span>
                <span class="username-input">Username</span>
                <input class="rectangle-2" type="text" name="username" value="{{ $data->username }}">
                @error('username')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Username
                        harap diisi
                        dengan benar*</small>
                @enderror
                <span class="password-input">Password</span>
                <input class="rectangle-3" type="password" name="pass_p">
                @error('pass_p')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">password
                        harap diisi
                        dengan benar*</small>
                @enderror
                <span class="email-field">Jabatan</span>
                <select class="rectangle-box" name="jabatan">
                    <option value="a">a</option>
                    <option value="b">b</option>
                    <option value="c">c</option>
                </select>
                @error('jabatan')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">jabatan
                        harap diisi
                        dengan benar*</small>
                @enderror
                <span class="address-field">Alamat</span>
                <textarea class="rectangle-box-4" name="alamat"> {{ $data->alamat }}</textarea>
                @error('alamat')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">alamat
                        harap diisi
                        dengan benar*</small>
                @enderror
            @endforeach

            <button class="rectangle-6">
                <span class="buat-akun">Simpan</span>
            </button>
            <span class="kembali">
                <a href="../manajemen_akun">Kembali</a>
            </span>
        </form>
    </div>
@endsection
