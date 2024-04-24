@extends('user.layouts.dashboard-user')

@section('isi')
    <link rel="StyleSheet" href="css/halaman_input_laporan_user.css" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>

    <form action="{{ route('tambah_laporan') }}" method="post">
        @csrf
        <div nameid="Rectangle 18" id="rectangle_18">
            <img src="assets/images/rectangle_no2.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Laporan" id="input_laporan">
                Input Laporan
            </div>
            <div nameid="Sisa laporan :" id="sisa_laporan__">
                Sisa laporan : {{ $batas }}
            </div>

            <img src="assets/images/logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
                id="logo_smart_peamekasan_2" />





            <div id="group_13" nameid="Group 13">
                <div nameid="Kriteria laporan" id="kriteria_laporan">
                    Kriteria laporan
                </div>
                <div nameid="jenis laporan" id="jenis_laporan">
                    jenis laporan
                </div>
                <select nameid="Rectangle 19" id="rectangle_19" name="kriteria_laporan">
                    <option value="fasilitas">Fasilitas</option>
                    <option value="pelayanan">Pelayanan</option>

                </select>

                <script src="js/opsi.js"></script>

                {{-- <select nameid="Rectangle 27" id="rectangle_27">
                <option value="c">c</option>
            </select> --}}

                <textarea nameid="Rectangle 20" id="rectangle_20" name="isi"></textarea>
                <div nameid="Isi laporan" id="isi_laporan">
                    Isi laporan
                </div>
                <div class="bungkus_tombol">
                    <button nameid="Kirim" id="rectangle_21_ek1">
                        Kirim
                    </button>


                    <a href="dashboard_user">
                        <div id="tombol_konfirmasi_ek2" nameid="tombol konfirmasi">
                            <div nameid="tombol konfirmasi" id="_bg__tombol_konfirmasi_ek3"></div>
                            <div nameid="Rectangle 21" id="rectangle_21_ek2"></div>
                            <div nameid="Batal" id="batal">
                                Batal
                            </div>

                        </div>
                    </a>



                </div>

            </div>
        </div>
    </form>
@endsection
