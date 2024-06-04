@extends('user.layouts.dashboard-user')

@section('isi')
    <div class="rectangle_edit_user">
        <div class="rectangle-button_edit_user"></div><span class="edit-data_edit_user">Edit data</span>
        <div class="logo-smart-peamekasan_edit_user">

        </div>
        @foreach ($data_u as $data)
            <?php $a = explode(',', $data->tempat_tanggal_lahir); ?>
            <form action="{{ route('proses_edit') }}" method="POST">
                @csrf
                <input type="hidden" name="id_kunci_edit_user" value="{{ $data->id_user }}">
                <span class="nama_edit_user">Nama</span>
                <input class="rectangle-2_edit_user" type="text" value="{{ $data->nama }}" name="namauser">
                @error('nama_user')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror


                <span class="tempat-lahir_edit_user">Tempat lahir</span>

                <input class="rectangle-5_edit_user" value="{{ $a[0] }} " name="tela" min="1945-01-01">
                @error('tela')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror

                <span class="tanggal-lahir_edit_user">Tanggal lahir</span>
                <input class="rectangle-6_edit_user" type="date" name="tala">
                @error('tala')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror

                <span class="no-tlp_edit_user">No tlp</span>
                <input class="rectangle-8_edit_user" type="number" value="{{ $data->no_tlp }}" name="no_tlp"
                    maxlength="12">
                @error('no_tlp')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror

                <span class="alamat_edit_user">Alamat</span>
                <textarea class="rectangle-4_edit_user" name="tempat">{{ $data->alamat }}</textarea>
                @error('tempat')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror

                <a href="biodata_user">
                    <div class="rectangle-7_edit_user"><span class="batal_edit_user">Batal</span></div>
                </a>
                <button href="biodata_user">
                    <div class="rectangle-1_edit_user"><span class="simpan_edit_user">Simpan</span>
                    </div>
                </button>
            </form>
        @endforeach



    </div>
@endsection
