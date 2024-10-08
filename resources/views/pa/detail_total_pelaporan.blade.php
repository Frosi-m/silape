@extends('pa.layouts.dashboard-pa')
@section('isi')
    <div id="group_32_laporan" nameid="Group 32">
        <form action="{{ route('detail_t_p') }}" method="POST">
            <div nameid="Rectangle 18" id="rectangle_18_laporan">
                <a href="{{ route('total_laporan') }}">
                    <span class="ion--arrow-back-circle"></span>
                </a>
                <img src="assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_21" />
                <div nameid="Input Tanggapan" id="input_tanggapan">
                    Total pelaporan
                </div>

                <div class="opsi_laporan">
                    <h4>Lihat lebih detail</h4>
                    <select onchange="window.location.href=this.value;">

                        <option value="{{ route('detail_t_p') }}">Pilih opsinya</option>
                        <option value="{{ route('detail_t_p') }}?jenis_laporan=Fasilitas">Fasilitas</option>
                        <option value="{{ route('detail_t_p') }}?jenis_laporan=Rawat_jalan">Rawat jalan</option>
                        <option value="{{ route('detail_t_p') }}?jenis_laporan=Rawat_inap">Rawat inap</option>
                        <option value="{{ route('detail_t_p') }}?jenis_laporan=Admisi">Admisi</option>
                        <option value="{{ route('detail_t_p') }}?jenis_laporan=Lab">Lab</option>
                        <option value="{{ route('detail_t_p') }}?jenis_laporan=Radiologi">Radiologi</option>
                        <option value="{{ route('detail_t_p') }}?jenis_laporan=Farmasi">Farmasi</option>
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
                            labels: @json($data_per_thn['tahunan']),
                            datasets: [{
                                    label: 'data pelaporan',
                                    data: @json($data_per_thn['data_thn']),
                                    borderColor: 'rgb(0, 255, 0)',
                                    backgroundColor: 'rgba(0, 255, 0, 0.5)',
                                    borderWidth: 2,
                                    borderRadius: 10,
                                    hoverOffset: 1
                                },
                                {
                                    label: 'data tanggapan',
                                    data: @json($data_per_thn['data_thn_2']),
                                    borderColor: 'rgb(255, 0, 0)',
                                    backgroundColor: 'rgba(255, 0, 0, 0.5)',
                                    borderWidth: 2,
                                    borderRadius: 10,
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
                                    position: 'bottom',
                                    display: true,
                                    text: 'Keterangan total laporan'
                                }
                            },
                        }
                    });
                </script>

                {{-- ini masih uji coba --}}
                <div class="card ">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis laporan</th>
                                    <th>Tanggal laporan</th>
                                    <th>Status laporan</th>
                                    <th>Isi laporan</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($data_per_thn['list_lp'] as $data_list)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $data_list->jenis_laporan }}</td>
                                        <td>{{ date('d/F/Y', strtotime($data_list->tgl_laporan)) }}</td>
                                        <td>{{ $data_list->status_laporan }}</td>
                                        <td>{{ substr($data_list->isi_laporan, 0, 20) }}</td>
                                        <?php
                                        $no++;
                                        ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis laporan</th>
                                    <th>Tanggal laporan</th>
                                    <th>Status laporan</th>
                                    <th>Isi laporan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </form>
    </div>
@endsection
