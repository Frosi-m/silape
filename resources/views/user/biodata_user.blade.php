@extends('user.layouts.dashboard-user')


@section('isi')
    <div class="rectangle-bio">
        <div class="rectangle-1-bio">
            <span class="biodata-user">Biodata user</span>
        </div>

        <div class="logo-smart-peamekasan">
        </div>
        <img src="assets/images/8e1f03a2-70c8-4103-a205-bb51545ef76d.png" nameid="dsBuffer 1" id="dsbuffer" />
        @foreach ($data_user as $data)
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $data->email }}</td>
                </tr>
                <tr>
                    <td>No_telp</td>
                    <td>:</td>
                    <td>{{ $data->no_tlp }}</td>
                </tr>
            </table>
        @endforeach


        <div class="bungkus_tombol_bio">

            <div nameid="Rectangle 21" id="rectangle_21_ek1-bio">
                <a href="edit_user">
                    <div nameid="Kirim" id="kirim-bio">
                        Edit data
                    </div>
                </a>
            </div>




            <div nameid="Rectangle 21" id="rectangle_21_ek2-bio">
                <a href="dashboard_user">
                    <div nameid="Batal" id="batal-bio">
                        Kembali
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
