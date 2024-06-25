@extends('user.layouts.dashboard-user')
@section('isi')
    <div id="group_32" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18">
            <img src="\assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Tanggapan" id="input_tanggapan">
                detail laporan
            </div>
            <a href="{{ route('dashboard_untuk_user') }}">
                <span class="ion--arrow-back-circle"></span>
            </a>
        </div>

        <img src="\assets\images\logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
            id="logo_smart_peamekasan_2" />
        <div id="group_13" nameid="Group 13">
            <div nameid="Kriteria laporan" id="kriteria_laporan">
                Kriteria laporan
            </div>
            <div nameid="Rectangle 19" id="rectangle_19">
                <span id="isi">
                    {{ $detail_lp->jenis_laporan }}
                </span>
            </div>
            <div nameid="nama pelapor" id="nama_pelapor">
                nama pelapor
            </div>
            <div nameid="Rectangle 21" id="rectangle_21_ek1">
                <span class="isi">
                    {{ $detail_lp->username }}
                </span>
            </div>
            <div nameid="nama pelapor" id="nama_petugas">
                nama petugas
            </div>
            <div nameid="Rectangle 21" id="rectangle_21_ek12">
                <span class="isi">
                    {{ $detail_lp->username }}
                </span>
            </div>

            <div nameid="Rectangle 20" id="rectangle_20_isi_lp">
                {{ $detail_lp->isi_laporan }}
            </div>
            <div id="isi_tanggapan">
                Isi laporan
            </div>

            <div name="isi_tanggapan" nameid="Rectangle 20" id="rectangle_20_isi_tp"></div>
            <div id="isi_tanggapan_2">
                Isi tanggapan
            </div>


        </div>
    </div>
@endsection
