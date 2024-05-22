@extends('pa.layouts.dashboard-pa')
@section('isi')
    <div id="group_32" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18">
            <a href="dashboard_petugas">
                <span class="ion--arrow-back-circle"></span>
            </a>
            <img src="assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Tanggapan" id="input_tanggapan">
                Data tanggapan
            </div>
            <div class="bagan_chart_p">
                <canvas id="myChart_bar"></canvas>
            </div>
        </div>



        <script>
            const ctx = document.getElementById('myChart_bar');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($simpan_data['tahunan']),
                    datasets: [{
                        label: 'data pelaporan',
                        data: @json($simpan_data['data_thn']),
                        borderColor: 'rgb(0, 255, 0)',
                        backgroundColor: 'rgba(0, 255, 0, 0.5)',
                        borderWidth: 2,
                        borderRadius: 10,
                        hoverOffset: 1
                    }]
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
    </div>
@endsection
