@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="StyleSheet" href="\css\halaman_input_tanggapan_laporan.css" />

    <div id="group_32" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18">
            <a href="{{ route('manajemen_laporan') }}"><span class="ion--arrow-back-circle"></span></a>

            <img src="\assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_22" />
            <div nameid="Input Tanggapan" id="konfirmasi_tanggapan">
                Konfirmasi Tanggapan
            </div>
        </div>

        <img src="\assets\images\logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
            id="logo_smart_peamekasan_2" />
        <div id="group_13" nameid="Group 13">

            <div nameid="Kriteria laporan" id="kriteria_laporan">
                Kriteria laporan
            </div>
            <div nameid="Rectangle 19" id="rectangle_19">
                <span>
                    {{ $dt_laporan->jenis_laporan }}
                </span>
            </div>
            <div nameid="nama pelapor" id="nama_pelapor">
                nama pelapor
            </div>
            <div nameid="Rectangle 21" id="rectangle_21_ek1">
                <span>
                    {{ $dt_laporan->username }}
                </span>
            </div>
            <div nameid="Rectangle 20" id="rectangle_20">
                <p>
                    {{ $dt_laporan->isi_laporan }}
                </p>
            </div>
            <div nameid="Isi tanggapan" id="isi_tanggapan">
                Isi laporan
            </div>

            <div class="bungkus_tombol">
                <div id="tombol_konfirmasi" nameid="tombol konfirmasi">
                    <div nameid="tombol konfirmasi" id="_bg__tombol_konfirmasi_ek1"></div>
                    <a onclick="window.location.href='{{ route('konfirmasi_laporan', $dt_laporan->id_detail_laporan) }}'">
                        <div nameid="Rectangle 21" id="rectangle_21_ek2">
                            <div nameid="Kirim" id="konfirmasi">
                                Konfirmasi
                            </div>
                        </div>
                    </a>


                </div>

                <div id="tombol_konfirmasi_ek2" nameid="tombol konfirmasi">
                    <div nameid="tombol konfirmasi" id="_bg__tombol_konfirmasi_ek3"></div>
                    <a onclick="window.location.href='{{ route('tolak_laporan', $dt_laporan->id_detail_laporan) }}'">
                        <div nameid="Rectangle 21" id="rectangle_21_ek3">
                            <div nameid="Batal" id="batal">
                                Tolak
                            </div>
                        </div>
                    </a>



                </div>
            </div>


        </div>
    </div>
@endsection
