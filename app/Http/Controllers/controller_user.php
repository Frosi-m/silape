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

    public function register_user(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'pass' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'tlp' => 'requored'
        ]);

        return view('user/halaman_login_user');
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
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // $data_p = bcrypt($data['password']);
        // dd($data);
        // $data_tb = DB::table('tb_user')->where('email','=', $data['email'])->get();
        if (Auth::guard('tb_user')->attempt($data)) {
            $user = Auth::guard('tb_user')->user();
            
            $data_user = [
                'nama' => $user->username,
                'email' => $user->email,
                'alamat' => $user->alamat,
                'tlp' => $user->no_tlp
            ];
            
            session()->put('data_user', $data_user);

            return redirect()->route('dashboard_untuk_user');
        }
        else {
            return redirect()->route('halaman_login_user')->with('failed', 'Username atau password salah!!!');
        }

    }

    public function logout_user(){
        Auth::logout();
        session()->flush();
        return redirect()->route('halaman_login_user')->with('succes', 'Anda sudah logout');
    }

    public function tambah_laporan(Request $request){
        $request->validate([
            'isi' => 'required',
            'jenis_laporan' => 'required',
        ]);
    }
}
