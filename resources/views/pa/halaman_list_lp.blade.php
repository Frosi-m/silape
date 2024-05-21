@extends('pa.layouts.dashboard-pa')
@section('isi')
    <div id="group_32" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18">
            <a href="dashboard_petugas">
                <span class="ion--arrow-back-circle"></span>
            </a>
            <img src="\assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Tanggapan" id="input_tanggapan" style="font-size: 35px">
                Manajemen laporan
            </div>
            <img src="\assets\images\logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
                id="logo_smart_peamekasan_2" />

            @if (!$list_lp->isEmpty())
                <table id="example2" class="table table-bordered table-striped bg-light align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis laporan</th>
                            <th>Tanggal laporan</th>
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
                                <td>{{ echo date('d/F/Y', strtotime($data_list->tgl_laporan)) }}</td>
                                <td>{{ $data_list->isi_laporan }}</td>
                                <td>
                                    <div class="nav_table">
                                        <a
                                            onclick="window.location.href='{{ route('input_tanggapan', $data_list->id_pelaporan) }}'">konfirmasi</a>
                                    </div>
                                </td>
                                <?php
                                $no++;
                                ?>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="pesan">
                    <p>Maaf untuk saat ini laporan user belum ada !!</p>
                </div>
            @endif

        </div>




    </div>
    </div>
@endsection
