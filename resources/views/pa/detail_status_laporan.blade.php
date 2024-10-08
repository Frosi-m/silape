@extends('pa.layouts.dashboard-pa')
@section('isi')
    <div id="group_32_laporan" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18_laporan">
            <a href="{{ route('data_laporan') }}">
                <span class="ion--arrow-back-circle"></span>
            </a>
            <img src="assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Tanggapan" id="input_tanggapan">
                Status pelaporan
            </div>

            <div class="opsi_laporan">
                <h4>Lihat lebih detail</h4>
                <select onchange="window.location.href=this.value;">
                    <option value="{{ route('detail_s_p') }}">Pilih opsinya</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Fasilitas" actived>Fasilitas</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Rawat_jalan">Rawat jalan</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Rawat_inap">Rawat inap</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Admisi">Admisi</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Lab">Lab</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Radiologi">Radiologi</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Farmasi">Farmasi</option>
                </select>
            </div>
            <div class="bagan_chart">
                <canvas id="myChart_bar"></canvas>
            </div>

            <script>
                const ctx = document.getElementById('myChart_bar');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($data_s_per_thn['tahunan']),
                        datasets: [{
                                label: 'Gagal diproses',
                                data: @json($data_s_per_thn['data_thn'][0]),
                                borderWidth: 2,
                                backgroundColor: [
                                    'rgba(255,99,132,0.5)',
                                ],
                                borderColor: 'rgb(255,99,132)',
                                borderRadius: 5,
                                hoverOffset: 1
                            },
                            {
                                label: 'Belum diproses',
                                data: @json($data_s_per_thn['data_thn'][1]),
                                borderWidth: 2,
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.5)',
                                ],
                                borderColor: [
                                    'rgb(54, 162, 235)',
                                ],
                                borderRadius: 5,
                                hoverOffset: 1
                            }, {
                                label: 'Sedang diproses',
                                data: @json($data_s_per_thn['data_thn'][2]),
                                borderWidth: 2,
                                backgroundColor: [
                                    'rgba(255, 206, 86, 0.5)',
                                ],
                                borderColor: [
                                    'rgb(255, 206, 86)',
                                ],
                                borderRadius: 5,
                                hoverOffset: 1
                            }, {
                                label: 'Selesai diproses',
                                data: @json($data_s_per_thn['data_thn'][3]),
                                borderWidth: 2,
                                backgroundColor: [
                                    'rgba(75, 192, 192, 0.5)',
                                ],
                                borderColor: [
                                    'rgb(75, 192, 192',
                                ],
                                borderRadius: 5,
                                hoverOffset: 1
                            }
                        ]
                    },
                    options: {
                        responsive: false,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            },
                            title: {
                                position: 'top',
                                display: true,
                                text: 'Status  laporan'
                            }
                        },
                    }
                });
            </script>
            <div class="card ">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status laporan</th>
                                <th>Tanggal laporan</th>
                                <th>Jenis laporan</th>
                                <th>Nama pelapor</th>
                                <th>Isi laporan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($data_s_per_thn['list_lp'] as $data_list)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $data_list->status_laporan }}</td>
                                    <td>{{ date('d/F/Y', strtotime($data_list->tgl_laporan)) }}</td>
                                    <td>{{ $data_list->jenis_laporan }}</td>
                                    <td>{{ $data_list->username }}</td>
                                    <td>{{ substr($data_list->isi_laporan, 0, 20) }}</td>
                                    <?php
                                    $no++;
                                    ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Status laporan</th>
                                <th>Tanggal laporan</th>
                                <th>Jenis laporan</th>
                                <th>Nama pelapor</th>
                                <th>Isi laporan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>






    </div>
    </div>
@endsection
