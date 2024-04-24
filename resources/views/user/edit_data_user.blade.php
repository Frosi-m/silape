@extends('user.layouts.dashboard-user')

@section('isi')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="css/edit-data-user.css" />

    <div class="rectangle">
        <div class="rectangle-button"></div><span class="edit-data">Edit data</span>
        <div class="logo-smart-peamekasan">

        </div>
        @foreach ($data_u as $data)
            <?php $a = explode(',', $data->tempat_tanggal_lahir); ?>
            <form action="{{ route('proses_edit') }}" method="POST">
                @csrf
                <input type="hidden" name="id_kunci" value="{{ $data->id }}">
                <span class="nama">Nama</span>
                <input class="rectangle-2" type="text" value="{{ $data->username }}" name="namauser">
                @error('nama_user')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror


                <span class="tempat-lahir">Tempat lahir</span>

                <input class="rectangle-5" value="{{ $a[0] }} " name="tela" min="1945-01-01">
                @error('tela')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror

                <span class="tanggal-lahir">Tanggal lahir</span>
                <input class="rectangle-6" type="date" name="tala">
                @error('tala')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror

                <span class="no-tlp">No tlp</span>
                <input class="rectangle-8" type="number" value="{{ $data->no_tlp }}" name="no_tlp">
                @error('no_tlp')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror

                <span class="alamat">Alamat</span>
                <textarea class="rectangle-4" name="tempat">{{ $data->alamat }}</textarea>
                @error('tempat')
                    <small style="color: red;font-style: italic; position: relative; top: 85px; left: 38px;">Email
                        harap diisi
                        dengan benar*</small>
                @enderror

                <a href="biodata_user">
                    <div class="rectangle-7"><span class="batal">Batal</span></div>
                </a>
                <button href="biodata_user">
                    <div class="rectangle-1"><span class="simpan">Simpan</span>
                    </div>
                </button>
            </form>
        @endforeach



    </div>
@endsection
