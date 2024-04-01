@extends('user.layouts.dashboard-user')

@section('isi')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="css/edit-data-user.css" />

    <div class="rectangle">
        <div class="rectangle-button"></div><span class="edit-data">Edit data</span>
        <div class="logo-smart-peamekasan">

        </div>
        <span class="nama">Nama</span>
        <input class="rectangle-2" type="text">

        <textarea class="rectangle-4"></textarea>
        <span class="tempat-lahir">Tempat lahir</span>
        <input class="rectangle-5">

        <span class="tanggal-lahir">Tanggal lahir</span>
        <input class="rectangle-6" type="date">
        <span class="no-tlp">No tlp</span>
        <input class="rectangle-8" type="number">
        <span class="alamat">Alamat</span>
        <a href="biodata_user">
            <div class="rectangle-7"><span class="batal">Batal</span></div>
        </a>
        <a href="biodata_user">
            <div class="rectangle-1"><span class="simpan">Simpan</span>
            </div>
        </a>


    </div>
@endsection
