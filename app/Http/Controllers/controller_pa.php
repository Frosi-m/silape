<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function proses_login_pa(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('tb_pa')->attempt($data)) {
            return redirect()->route('da_admin');
        }
        else {
            return redirect()->route('halaman_login_pa')->with('failed', 'Username atau password salah!!!');
        }

    }
    public function logout_pa(){
        Auth::logout();
        return redirect()->route('halaman_login_pa')->with('succes', 'Anda sudah logout');
    }
}
