@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="StyleSheet" href="css\halaman_input_tanggapan_laporan.css" />


    <div id="group_32_laporan" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18_laporan">
            <a href="da_admin">
                <span class="ion--arrow-back-circle"></span>
            </a>
            <img src="assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Tanggapan" id="input_tanggapan">
                Manajemen akun
            </div>
            <img src="assets\images\logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
                id="logo_smart_peamekasan_2" />
            <table id="example2" class="table table-bordered table-striped bg-light align-center">
                <?php
                $no = 1;
                ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th colspan="2">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_p as $data)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->jabatan }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td class="align-middle"><a href="edit_petugas\{{ $data->id_pa }}"
                                    class="btn btn-outline-dark ">Edit</a></td>
                            <td><a href="hapus_petugas\{{ $data->id_pa }}" class="btn btn-outline-danger">Hapus</a></td>
                        </tr>
                        <?php
                        $no++;
                        ?>
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>
@endsection
