<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use App\Models\tb_pa;
use App\Models\tb_tanggapan;
use App\Models\detail_laporan_a;
use App\Models\detail_laporan_p;

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

    public function input_tanggapan($s)
    {   $data_laporan = DB::table('tb_laporan')
                            ->join('detail_laporan', 'tb_laporan.id_laporan', '=', 'detail_laporan.id_pelaporan')
                            ->join('tb_user', 'tb_laporan.id_pelapor', '=', 'tb_user.id_user')
                            ->select('tb_user.username','tb_laporan.isi_laporan', 'detail_laporan.id_detail_laporan', 'detail_laporan.id_pelaporan','detail_laporan.jenis_laporan', 'detail_laporan.tgl_laporan')
                            ->where('id_laporan',$s)
                            ->first();
        return view('pa/halaman_input_tanggapan', ['dt_laporan' => $data_laporan]);
    }

    public function proses_tanggapan(Request $request){
        $request->validate([
            'isi_tanggapan' => 'required'
        ]);

        $tambah_tanggapan   = new tb_tanggapan;
        $data_tanggapan     = detail_laporan_p::find($request->id_laporan);
        $tgl_tanggapan      = Carbon::now();

        $tambah_tanggapan->isi_tanggapan    = $request->isi_tanggapan;
        $tambah_tanggapan->id_petugas       = session('data_pa')['id'];
        $tambah_tanggapan->save();

        $data_tanggapan->id_umpan_balik     = $tambah_tanggapan->id_tanggapan;
        $data_tanggapan->tgl_tanggapan      = $tgl_tanggapan->format('Y/m/d');
        $data_tanggapan->status_laporan     = 'selesai diproses';
        $data_tanggapan->save();

        return redirect()->route('list_lp');


    }    

    public function list_laporan(){
        $data_user =DB::table('tb_laporan')
                            ->join('detail_laporan', 'tb_laporan.id_laporan', '=', 'detail_laporan.id_pelaporan')
                            ->join('tb_user', 'tb_laporan.id_pelapor', '=', 'tb_user.id_user')
                            ->select('tb_user.username','tb_laporan.isi_laporan', 'detail_laporan.id_detail_laporan', 'detail_laporan.id_pelaporan','detail_laporan.jenis_laporan', 'detail_laporan.tgl_laporan')
                            ->where('status_laporan', 'sedang diproses')
                            ->where('jenis_laporan', session('data_pa')['jbt'])
                            ->get();
        // dd($data_user);
        return view('pa/halaman_list_lp', ['list_lp' => $data_user]);
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
        $data_user = DB::table('detail_laporan')
                            ->where('status_laporan', 'belum diproses')
                            ->get();
        // dd($data_user);
        return view('pa/manajemen_laporan',['list_lp' => $data_user]);
    }

    public function laporan_konfirmasi($p){
        $data_laporan = DB::table('tb_laporan')
                            ->join('detail_laporan', 'tb_laporan.id_laporan', '=', 'detail_laporan.id_pelaporan')
                            ->join('tb_user', 'tb_laporan.id_pelapor', '=', 'tb_user.id_user')
                            ->select('tb_user.username','tb_laporan.isi_laporan', 'detail_laporan.id_detail_laporan','detail_laporan.jenis_laporan', 'detail_laporan.tgl_laporan', 'detail_laporan.status_laporan')
                            ->where('id_laporan',$p)
                            ->first();
        // dd($data_laporan);
        return view('pa/halaman_konfirmasi_tanggapan', ['dt_laporan' => $data_laporan]);
    }

    public function laporan_ditolak($p){
        $update_status_laporan = detail_laporan_a::find($p);

        $update_status_laporan->status_laporan  = 'gagal diproses';

        $update_status_laporan->save();

        return redirect()->route('manajemen_laporan');

    }

    public function laporan_diterima($p){
        $update_status_laporan = detail_laporan_a::find($p);

        //cek dulu takut datanya tidak ditemukan
        if($update_status_laporan == null){
            return redirect()->route('manajemen_laporan')->with('lp_gagal','laporan gagal di proses');
        }
        $update_status_laporan->status_laporan  = 'sedang diproses';

        $update_status_laporan->save();

        return redirect()->route('manajemen_laporan')->with('lp_berhasil','laporan berhasil di proses');

    }
    public function register_akun()
    {
        return view('pa/register_petugas');
    }

    public function tambah_akun(Request $request) :RedirectResponse
    {
        $request->validate([
            'username' => 'required',
            'pass_p' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required' ,
        ]);
        //ini mengguakan metode eloquent laravel

        $inputan = new tb_pa;

        $inputan->username  = $request->username;
        $inputan->password  = bcrypt($request->pass_p);
        $inputan->alamat    = $request->alamat;
        $inputan->jabatan  = $request->jabatan;

        $inputan->save();
        //ini menggunakan metode insert biasa
        // $data = [
        //     'username' => $request->username,
        //     'password' => $request->pass_p,
        //     'alamat' => $request->alamat,
        //     'jabatan' => $request->jabatan,
        // ];
        // DB::table('tb_pa')->insert([
        //     'username' => $data['username'],
        //     'password' => bcrypt($data['password']),
        //     'jabatan' => $data['jabatan'],
        //     'alamat' => $data['alamat'],
        // ]);
        return redirect()->route('da_admin')->with('berhasil', 'Akun anda berhasil dibuat');
    }
    public function total_laporan(){
        $t_lp_f = DB::table('detail_laporan')
                        ->where('jenis_laporan', 'fasilitas')
                        ->count();
        $t_lp_rj = DB::table('detail_laporan')
                        ->where('jenis_laporan', 'rawat jalan')
                        ->count();
        $t_lp_ri = DB::table('detail_laporan')
                        ->where('jenis_laporan', 'rawat inap')
                        ->count();
        $t_lp_a = DB::table('detail_laporan')
                        ->where('jenis_laporan', 'admisi')
                        ->count();
        $t_lp_fi = DB::table('detail_laporan')
                        ->where('jenis_laporan', 'farmasi')
                        ->count();
        $t_lp_l = DB::table('detail_laporan')
                        ->where('jenis_laporan', 'lab')
                        ->count();
        $t_lp_r = DB::table('detail_laporan')
                        ->where('jenis_laporan', 'radiologi')
                        ->count();
        $data_lp = [
            'labels'    => [
                            'Fasilitas', 
                            'Rawat Jalan', 
                            'Rawat Inap', 
                            'Admisi', 
                            'farmasi', 
                            'lab', 
                            'radiologi'
                    ],
            'data'      => [
                            $t_lp_f, 
                            $t_lp_rj, 
                            $t_lp_ri, 
                            $t_lp_a, 
                            $t_lp_fi, 
                            $t_lp_l, 
                            $t_lp_r]
        ];
        // dd($data_lp);
        return view('pa/total_pelaporan', compact('data_lp'));
    }
    public function data_laporan()
    {
        $t_lp_g = DB::table('detail_laporan')
                        ->where('status_laporan', 'gagal diproses')
                        ->count();
        $t_lp_sep = DB::table('detail_laporan')
                        ->where('status_laporan', 'sedang diproses')
                        ->count();
        $t_lp_b = DB::table('detail_laporan')
                        ->where('status_laporan', 'belum diproses')
                        ->count();
        $t_lp_sup = DB::table('detail_laporan')
                        ->where('status_laporan', 'selesai diproses')
                        ->count();
        
        $data_lp = [
            'labels'    => [
                            'Gagal diproses', 
                            'Sedang diproses', 
                            'Belum diproses', 
                            'Selesai diproses', 
                    ],
            'data'      => [
                            $t_lp_g, 
                            $t_lp_sep, 
                            $t_lp_b, 
                            $t_lp_sup, 
                            ]
        ];                
        return view('pa/status_pelaporan', compact('data_lp'));
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

        //ini menggunakan metode eloquent
        $update_pa = tb_pa::find($request->kunci);

        $update_pa->username    = $request->username;
        $update_pa->password    = bcrypt($request->pass_p);
        $update_pa->jabatan     = $request->jabatan;
        $update_pa->alamat      = $request->alamat;

        $update_pa->save();

        //ini menggunakan metode biasa untuk update data

        // $pass = $request->pass_p;
        // DB::table('tb_pa')->where('id',$request->kunci)->update([
        //     'username' => $request->username,   
        //     'password' => bcrypt($pass),
        //     'jabatan' => $request->jabatan,
        //     'alamat' => $request->alamat,
        // ]);
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
            
            $data = [
                'id'    => $user->id_pa,
                'nama'  => $user->username,
                'jbt'   => $user->jabatan
            ];
            session()->put('data_pa', $data);

            if ($user->jabatan == "admin") {
                
                return redirect()->route('da_admin');
            }
            else {
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
