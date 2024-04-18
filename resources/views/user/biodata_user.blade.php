@extends('user.layouts.dashboard-user')


@section('isi')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
    <link rel="stylesheet" href="css/background-logo.css" />
    <div class="rectangle-bio">
        <div class="rectangle-1-bio">
            <span class="biodata-user">Biodata user</span>
        </div>

        <div class="logo-smart-peamekasan">
        </div>
        <img src="assets/images/8e1f03a2-70c8-4103-a205-bb51545ef76d.png" nameid="dsBuffer 1" id="dsbuffer" />
        @if (session('data_user'))
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ session('data_user')['nama'] }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ session('data_user')['alamat'] }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ session('data_user')['email'] }}</td>
                </tr>
                <tr>
                    <td>No_telp</td>
                    <td>:</td>
                    <td>{{ session('data_user')['tlp'] }}</td>
                </tr>
            </table>
        @endif


        <div class="bungkus_tombol">
            <div id="tombol_konfirmasi" nameid="tombol konfirmasi">
                <div nameid="tombol konfirmasi" id="_bg__tombol_konfirmasi_ek1"></div>
                <div nameid="Rectangle 21" id="rectangle_21_ek1"></div>
                <a href="edit_user">
                    <div nameid="Kirim" id="kirim">
                        Edit data
                    </div>
                </a>


            </div>

            <div id="tombol_konfirmasi_ek2" nameid="tombol konfirmasi">
                <div nameid="tombol konfirmasi" id="_bg__tombol_konfirmasi_ek3"></div>
                <div nameid="Rectangle 21" id="rectangle_21_ek2"></div>
                <a href="dashboard_user">
                    <div nameid="Batal" id="batal">
                        Kembali
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
