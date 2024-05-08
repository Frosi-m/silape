@extends('pa.layouts.dashboard-pa')
@section('isi')
    <link rel="StyleSheet" href="\css\halaman_input_tanggapan_laporan.css" />


    <div id="group_32" nameid="Group 32">
        <div nameid="Rectangle 18" id="rectangle_18">
            <img src="\assets\images\rectangle_21.png" nameid="Rectangle 21" id="rectangle_21" />
            <div nameid="Input Tanggapan" id="input_tanggapan">
                Input Tanggapan
            </div>
        </div>

        <img src="\assets\images\logo_smart_peamekasan_2.png" nameid="logo smart peamekasan 2"
            id="logo_smart_peamekasan_2" />
        <div id="group_13" nameid="Group 13">
            <form action="{{ route('proses_tanggapan') }}" method="POST">

                @csrf
                <input type="hidden" name="id_laporan" value="{{ $dt_laporan->id_detail_laporan }}">
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

                <div nameid="Rectangle 20" id="rectangle_20_isi_lp">
                    {{ $dt_laporan->isi_laporan }}
                </div>
                <div id="isi_tanggapan">
                    Isi laporan
                </div>

                <textarea name="isi_tanggapan" nameid="Rectangle 20" id="rectangle_20_isi_tp"></textarea>
                <div id="isi_tanggapan_2">
                    Isi tanggapan
                </div>

                <div class="bungkus_tombol">
                    <div id="tombol_konfirmasi" nameid="tombol konfirmasi">
                        <div nameid="tombol konfirmasi" id="_bg__tombol_konfirmasi_ek1"></div>
                        <button nameid="Rectangle 21" id="rectangle_21_ek2">
                            <div nameid="Kirim" id="kirim_2">
                                Kirim
                            </div>
                        </button>


                    </div>

                    <div id="tombol_konfirmasi_ek2" nameid="tombol konfirmasi">
                        <div nameid="tombol konfirmasi" id="_bg__tombol_konfirmasi_ek3"></div>
                        <a href="{{ route('list_lp') }}">
                            <div nameid="Rectangle 21" id="rectangle_21_ek3">
                                <div nameid="Batal" id="batal">
                                    Batal
                                </div>
                            </div>
                        </a>



                    </div>
                </div>
            </form>




        </div>
    </div>
@endsection
