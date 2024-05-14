<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>halaman_dashboard_petugas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="StyleSheet" href="../css/halaman_dashboard_pa.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Add your custom HEAD content here -->

</head>

<body>
    <div id="content-container">
        <div nameid="Halaman dashboard petugas" id="_bg__halaman_dashboard_petugas"></div>
        <img src="../assets/images/logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
            id="logo_smart_peamekasan_2" />
        <div nameid="header hompage silape" id="header_hompage_silape">
            <div id="logo_silape" nameid="logo silape">
                <div nameid="logo silape" id="_bg__logo_silape_ek1"></div>
                <div nameid="SILAPE" id="silape">
                    SILAPE
                </div>
                <div nameid="Sistem Laporan Pelayanan" id="sistem_laporan_pelayanan">
                    Sistem Laporan Pelayanan
                </div>
                <div nameid="RSUD dr. H. Slamet Martodirdjo" id="rsud_dr__h__slamet_martodirdjo">
                    RSUD dr. H. Slamet Martodirdjo
                </div>
                <img src="../assets/images/image_1.png" nameid="image 1" id="image_1" />

            </div>
            <div class="akun">
                @if (session('data_pa'))
                    <div class="welcome">Welcome {{ session('data_pa')['nama'] }} </div>
                @endif

                <a href="{{ route('logout_untuk_pa') }}">
                    <div class="logout">Logout</div>
                </a>
                <img src="../assets/images/dsbuffer_1.png" nameid="dsBuffer 1" id="dsbuffer_1" />
            </div>


        </div>


        <div id="group_20" nameid="Group 20">
            @yield('isi')

        </div>

    </div>
</body>

</html>
