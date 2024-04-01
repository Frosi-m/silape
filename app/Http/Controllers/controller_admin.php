<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controller_admin extends Controller
{
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
