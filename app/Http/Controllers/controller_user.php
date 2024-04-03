<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class controller_user extends Controller
{
    #untuk root bagian user
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

    #untuk login user

    public function proses_login_user(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('tb_user')->attempt($data)) {
            return redirect()->route('dashboard_untuk_user');
        }
        else {
            return redirect()->route('halaman_login_user')->with('failed', 'Username atau password salah!!!');
        }

    }

    public function logout_user(){
        Auth::logout();
        return redirect()->route('halaman_login_user')->with('succes', 'Anda sudah logout');
    }
}
