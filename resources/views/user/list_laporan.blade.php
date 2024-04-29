@extends('user.layouts.dashboard-user')

@section('isi')
    <link rel="StyleSheet" href="css/halaman_input_laporan_user.css" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>

    <form action="#" method="post">
        @csrf
        <div nameid="Rectangle 18" id="rectangle_18">
            <img src="assets/images/rectangle_no2.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Laporan" id="input_laporan">
                Daftar Laporan
            </div>
            <table>
                <tr>
                    <th>No</th>
                    <th>Jenis laporan</th>
                    <th>Tanggal laporan</th>
                    <th>Status laporan</th>
                    <th>Isi laporan</th>
                    <th>Opsi</th>
                </tr>
                <?php
                $no = 1;
                ?>
                @foreach ($list_lp as $data_list)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $data_list->jenis_laporan }}</td>
                        <td>{{ date('d/F/Y', strtotime($data_list->tgl_laporan)) }}</td>
                        <td>{{ $data_list->status_laporan }}</td>
                        <td>{{ substr($data_list->isi_laporan, 0, 20) }}</td>
                        <td>
                            <div class="nav_table">
                                <a href="detail_laporan\{{ $data_list->id_laporan }}">Lihat detail</a>
                            </div>
                        </td>
                        <?php
                        $no++;
                        ?>
                @endforeach
            </table>

            <img src="assets/images/logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
                id="logo_smart_peamekasan_2" />






        </div>
    </form>
@endsection
