@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="StyleSheet" href="css\halaman_input_tanggapan_laporan.css" />

    <div id="group_32_laporan" nameid="Group 32">
        <div id="rectangle_18_laporan">
            <a href="da_admin">
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
                <canvas id="myChart"></canvas>
            </div>

            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: @json($data_lp['labels']),
                        datasets: [{
                            label: 'Total',
                            data: @json($data_lp['data']),
                            borderWidth: 0,
                            backgroundColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgb(230, 115, 0)',
                                'rgb(153, 102, 255)',
                                'rgba(0, 102, 255)',
                            ],
                            hoverOffset: 1
                        }]
                    },
                    options: {
                        responsive: false,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'right',
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
            <table id="example1" class="table table-bordered table-hover w-75">
                <tr>
                    <th>No</th>
                    <th>Jenis laporan</th>
                    <th>Tanggal laporan</th>
                    <th>Status laporan</th>
                    <th>Isi laporan</th>
                </tr>
                <?php
                $no = 1;
                ?>
                @foreach ($data_lp['list_lp'] as $data_list)
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
            </table>
        </div>
    </div>
@endsection
