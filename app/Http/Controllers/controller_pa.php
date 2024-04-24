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
        $data_petugas = DB::table('tb_pa')->get();
        return view('pa/manajemen_akun', ['data_p' => $data_petugas]);
    }

    public function manajemen_laporan()
    {
        return view('pa/manajemen_laporan');
    }

    public function register_akun()
    {
        return view('pa/register_petugas');
    }

    public function tambah_akun(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'pass_p' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required' ,
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->pass_p,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
        ];
        DB::table('tb_pa')->insert([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'jabatan' => $data['jabatan'],
            'alamat' => $data['alamat'],
        ]);
        return redirect()->route('da_admin')->with('berhasil', 'Akun anda berhasil dibuat');
    }

    public function data_laporan()
    {
        return view('pa/data_pelaporan');
    }

    public function edit_petugas($p){
        $data_petugas = DB::table('tb_pa')->where('id',$p)->get();
        return view('pa/edit_petugas', ['data_pa'=> $data_petugas]);
    }

    public function proses_edit_akun(Request $request){

        $request->validate([
            'username' => 'required',
            'pass_p' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required' ,
        ]);

        $pass = $request->pass_p;
        DB::table('tb_pa')->where('id',$request->kunci)->update([
            'username' => $request->username,   
            'password' => bcrypt($pass),
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('manajemen_akun');
    }

    public function hapus_akun($p){
        DB::table('tb_pa')->where('id',$p)->delete();
        return redirect()->route('manajemen_akun');
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
            $user = Auth::guard('tb_pa')->user();
            
            if ($user->jabatan == "admin") {
                $data = [
                    'nama' => $user->username
                ];
                session()->put('data_pa', $data);
                return redirect()->route('da_admin');
            }
            else {
                $data = [
                    'nama' => $user->username
                ];
                session()->put('data_pa', $data);
                return redirect()->route('dashboard_petugas');
            }
            
        }
        else {
            return redirect()->route('halaman_login_pa')->with('failed', 'Username atau password salah!!!');
        }

    }
    public function logout_pa(){
        Auth::logout();
        session()->flush();
        return redirect()->route('halaman_login_pa')->with('succes', 'Anda sudah logout');
    }
}
