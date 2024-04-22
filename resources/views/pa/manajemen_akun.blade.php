@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="StyleSheet" href="css\halaman_input_tanggapan_laporan.css" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>


    <div id="group_32" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18">
            <a href="da_admin">
                <span class="ion--arrow-back-circle"></span>
            </a>
            <img src="assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Tanggapan" id="input_tanggapan">
                Manajemen akun
            </div>
        </div>

        <img src="assets\images\logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
            id="logo_smart_peamekasan_2" />
        <div id="group_13" nameid="Group 13">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th colspan="2">Opsi</th>
                </tr>
                @foreach ($data_p as $data)
                    <tr>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td><a href="edit_petugas\{{ $data->id }}">Edit</a></td>
                        <td><a href="hapus_petugas\{{ $data->id }}">Hapus</a></td>
                    </tr>
                @endforeach
            </table>



        </div>
    </div>
@endsection
