<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controller_petugas extends Controller
{
    public function halaman_login_pa()
    {
        return view('pa/halaman_login_pa');
    }
    public function data_tanggapan()
    {
        return view('pa/halaman_data_tanggapan');
    }
    public function input_tanggapan()
    {
        return view('pa/halaman_input_tanggapan');
    }
    public function dashboard_petugas()
    {
        return view('pa/menu_pa');
    }
    public function biodata_petugas()
    {
        return view('pa/biodata_petugas');
    }
}
