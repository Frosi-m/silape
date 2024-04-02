<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controller_pa extends Controller
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
    // admin
    public function da_admin()
    {
        return view('pa/menu_admin');
    }
    public function manajemen_akun()
    {
        return view('pa/manajemen_akun');
    }
    public function manajemen_laporan()
    {
        return view('pa/manajemen_laporan');
    }
    public function register_akun()
    {
        return view('pa/register_petugas');
    }
    public function data_laporan()
    {
        return view('pa/data_pelaporan');
    }
}
