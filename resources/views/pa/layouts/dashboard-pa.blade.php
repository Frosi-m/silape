<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>halaman_dashboard_petugas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <link rel="StyleSheet" href="../css/halaman_dashboard_pa.css" />
    <link rel="StyleSheet" href="../css/halaman_menu_admin.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}   ">
    <link rel="StyleSheet" href="../css/halaman_input_tanggapan_laporan.css" />
    <link rel="stylesheet" href="../css/register_petugas.css" />
    {{-- <link rel="StyleSheet" href="css/biodata_petugas.css" /> --}}


    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Add your custom HEAD content here -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,700,800">
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
    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
