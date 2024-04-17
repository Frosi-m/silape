<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>halaman_dashboard_user</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="StyleSheet" href="css/dashboard-user.css" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <!-- Add your custom HEAD content here -->

</head>

<body>
    <div nameid="Halaman dashboard user" id="_bg__halaman_dashboard_user"></div>
    <img src="assets/images/logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
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
            <img src="assets/images/image_1.png" nameid="image 1" id="image_1" />

        </div>
        @foreach ($data_user as $data)
            <div class="akun">
                <div class="welcome">Welcome {{ $data->username }}</div>
                <a href="   ">
                    <div class="logout">Logout</div>
                </a>
                <img src="assets/images/dsbuffer_1.png" nameid="dsBuffer 1" id="dsbuffer_1" />
            </div>
        @endforeach

    </div>
    </div>

    <div id="content-container">




        <div id="frame_27" nameid="Frame 27">

            @yield('isi')
        </div>
    </div>



</body>

</html>
