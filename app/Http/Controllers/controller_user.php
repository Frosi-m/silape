<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controller_user extends Controller
{
    public function bio_user()
    {
        return view('user/biodata_user');
    }
    public function halaman_login_user()
    {
        return view('user/halaman_login_user');
    }
    public function register_user()
    {
        return view('user/register_user');
    }
    public  function edit_user()
    {
        return view('user/edit_data_user');
    }
    public  function dashboard_user()
    {
        return view('user/menu_user');
    }
    public  function halaman_laporan()
    {
        return view('user/halaman_laporan');
    }
    public  function ubah_pw()
    {
        return view('user/ubah_pw');
    }
}
