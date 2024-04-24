<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\tb_user;

class controller_user extends Controller
{
    #untuk root bagian user
    public function bio_user()
    {
        $data_user = DB::table('tb_user')->where('id',session('data_user')['id'])->get();
        return view('user/biodata_user', ['data_user' => $data_user]);
    }
    
    public function halaman_login_user()
    {
        return view('user/halaman_login_user');
    }

    public function tambah_user(Request $request): RedirectResponse
    {
        $request->validate([
            'email'     => 'required',
            'pass_u'    => 'required',
            'username'  => 'required',
            'alamat'    => 'required',
            'tlp'       => 'required'
        ]);
        // ini menggunakan metode eloquent laravel untuk menambahkan data di tb_user

        $inputan  = new tb_user;

        $inputan->username  = $request->username;
        $inputan->password  = bcrypt($request->pass_u);
        $inputan->alamat    = $request->alamat;
        $inputan->no_tlp    = $request->tlp;
        $inputan->email     = $request->email;
        
        $inputan->save();

        // ini munggunakan cara insert sederhana untuk menambahkan data di tb_user

        // $data = [
        //     'username'   => $request->username,
        //     'password'   => $request->pass_u,
        //     'alamat'     => $request->alamat,
        //     'no_tlp'     => $request->tlp,
        //     'email'      => $request->email,
        // ];

        // DB::table('tb_user')->insert([
        //     'username'   => $data['username'],
        //     'password'   => bcrypt($data['password']),
        //     'alamat'     => $data['alamat'],
        //     'no_tlp'     =>$data['no_tlp'],
        //     'email'      => $data['email'],
        // ]);
        return redirect()->route('halaman_login_user')->with('berhasil', 'Akun anda berhasil dibuat');
    }

    public  function edit_user()
    {
        $data_user = DB::table('tb_user')->where('id',session('data_user')['id'])->get();
        return view('user/edit_data_user', ['data_u'=>$data_user]);
    }

    public  function proses_edit_user(Request $request)
    {
        $request->validate([
            'namauser' => 'required',
            'tela'      => 'required',
            'tala'      => 'required',
            'no_tlp'    => 'required',
            'tempat'    => 'required'
        ]);
        $update_user = tb_user::find($request->id_kunci);

        $update_user->username = $request->namauser;
        $update_user->tempat_tanggal_lahir = $request->tela.",".$request->tala;
        $update_user->no_tlp = $request->no_tlp;
        $update_user->alamat = $request->tempat;
        
        $update_user->save();
        // dd($cek);

        //ini menggunakan cara update sederhana untuk mengubah data pada table tb_user

        // DB::table('tb_user')->where('id', $request->id_kunci)->update([
        //     'username'              => $request->namauser,
        //     'tempat_tanggal_lahir'  => $request->tela.", ".$request->tala,
        //     'no_tlp'                => $request->no_tlp,
        //     'alamat'                => $request->tempat,
        // ]);

        return redirect()->route('bio_user');
    }

    public  function dashboard_user()
    {
        return view('user/menu_user');
    }

    public  function halaman_laporan()
    {
        $data_user  = DB::table('tb_user')->where('id',session('data_user')['id'])->first();
        return view('user/halaman_laporan', ['batas' => $data_user->batas_laporan]);
    }

    public  function ubah_pw()
    {
        return view('user/ubah_pw');
    }

    #untuk login user

    public function proses_login_user(Request $request){
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if (Auth::guard('tb_user')->attempt($data)) {
            $user = Auth::guard('tb_user')->user();
            
            $ada = [
                'id'    => $user->id,
                'nama'  => $user->username
            ];
            
            session()->put('data_user', $ada);

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
            'isi'           => 'required',
        ]);
        if ($request->kriteria_laporan != 'fasilitas') {
            echo "ok";
            
        }
    }
}
