@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="StyleSheet" href="css\halaman_input_tanggapan_laporan.css" />


    <div id="group_32" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18">
            <a href="da_admin">
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
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Fasilitas">Fasilitas</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Rawat_jalan">Rawat jalan</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Rawat_inap">Rawat inap</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Admisi">Admisi</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Lab">Lab</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Radiologi">Radiologi</option>
                    <option value="{{ route('detail_s_p') }}?jenis_laporan=Farmasi">Farmasi</option>
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
                                'rgba(255, 26, 86, 1)',
                                'rgba(75, 12, 192, 1)',
                                'rgba(25, 26, 86, 1)',
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
                                position: 'top',
                                display: true,
                                text: 'Status  laporan'
                            }
                        },
                    }
                });
            </script>
        </div>






    </div>
    </div>
@endsection
