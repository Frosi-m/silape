@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="StyleSheet" href="css\halaman_input_tanggapan_laporan.css" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>


    <div id="group_32" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18">
            <a href="da_admin">
                <span class="ion--arrow-back-circle"></span>
            </a>
            <img src="assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Tanggapan" id="input_tanggapan">
                Status pelaporan
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
