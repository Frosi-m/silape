@extends('user.layouts.dashboard-user')

@section('isi')
    <form action="#" method="post">
        @csrf
        <div id="group_32_laporan">
            <div nameid="Rectangle 18" id="rectangle_18_laporan">
                <a href="dashboard_user">
                    <span class="ion--arrow-back-circle"></span>
                </a>
                <img src="assets/images/rectangle_no2.png" nameid="Rectangle 21" id="rectangle_21" />
                <div nameid="Input Laporan" id="input_laporan">
                    Daftar Laporan
                </div>
                <img src="assets/images/logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
                    id="logo_smart_peamekasan_2" />
                <table id="example2" class="table table-bordered table-striped bg-light wd-75">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis laporan</th>
                            <th>Tanggal laporan</th>
                            <th>Status laporan</th>
                            <th>Isi laporan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                        <a href="detail_laporan\{{ $data_list->id_laporan }}" class="btn btn-outline-dark">
                                            detail</a>
                                    </div>
                                </td>
                                <?php
                                $no++;
                                ?>
                            </tr>
                        @endforeach
                    </tbody>
                </table>








            </div>
        </div>
    </form>
@endsection
