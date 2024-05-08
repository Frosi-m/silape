@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="StyleSheet" href="css\halaman_input_tanggapan_laporan.css" />

    <div id="group_32" nameid="Group 32">
        <form action="{{ route('detail_t_p') }}" method="POST">
            <div nameid="Rectangle 18" id="rectangle_18">
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
            </div>
        </form>
    </div>
@endsection
