<?php

namespace App\Http\Controllers;

use App\Models\tb_user;
use App\Models\tb_laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\detail_laporan_u;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class controller_user extends Controller
{
    #untuk root bagian user
    public function bio_user()
    {
        $data_user = DB::table('tb_user')->where('id_user',session('data_user')['id'])->get();
        return view('user/biodata_user', ['data_user' => $data_user]);
    }
    
    public function halaman_login_user()
    {
        return view('user/halaman_login_user');
    }

    public function tambah_user(Request $request): RedirectResponse
    {
        $request->validate([
            'email'     => 'required|email:dns|unique:tb_user',
            'pass_u'    => 'required',
            'nama'      => 'required',
            'alamat'    => 'required',
            'tlp'       => 'required|max:12|min:12'
        ]);
        // ini menggunakan metode eloquent laravel untuk menambahkan data di tb_user

        $inputan  = new tb_user;

        $inputan->username  = explode("@", $request->email)[0];
        $inputan->id_auth   = 0;
        $inputan->nama      = $request->nama;
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
        $data_user = DB::table('tb_user')->where('id_user',session('data_user')['id'])->get();
        return view('user/edit_data_user', ['data_u'=>$data_user]);
    }

    public  function proses_edit_user(Request $request)
    {
        $request->validate([
            'namauser'  => 'required',
            'tela'      => 'required',
            'tala'      => 'required',
            'no_tlp'    => 'required|max:12|min:12',
            'tempat'    => 'required'
        ]);
        $update_user = tb_user::find($request->id_kunci);

        $update_user->nama                  = $request->namauser;
        $update_user->tempat_tanggal_lahir  = $request->tela.",".$request->tala;
        $update_user->no_tlp                = $request->no_tlp;
        $update_user->alamat                = $request->tempat;
        
        $update_user->save();


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
        return view('user/halaman_laporan');
    }
    public  function list_laporan()
    {
        $data_user  = DB::table('tb_laporan')
                            ->join('detail_laporan', 'tb_laporan.id_laporan', '=', 'detail_laporan.id_pelaporan')
                            ->select('tb_laporan.isi_laporan', 'tb_laporan.id_laporan','detail_laporan.jenis_laporan', 'detail_laporan.tgl_laporan', 'detail_laporan.status_laporan')
                            ->where('id_pelapor',session('data_user')['id'])
                            ->get();
        return view('user/list_laporan', ['list_lp' => $data_user]);
    }

    public function detail_laporan($data){
        $data_user  = DB::table('detail_laporan')
                        ->join('tb_laporan', 'tb_laporan.id_laporan', '=', 'detail_laporan.id_pelaporan')
                        ->join('tb_tanggapan', 'tb_tanggapan.id_tanggapan', '=', 'detail_laporan.id_umpan_balik')
                        ->join('tb_user', 'tb_laporan.id_pelapor', '=', 'tb_user.id_user')
                        ->join('tb_pa', 'tb_tanggapan.id_petugas', '=', 'tb_pa.id_pa')
                        ->select('tb_tanggapan.isi_tanggapan','tb_pa.username_pa','tb_user.username','tb_laporan.isi_laporan', 'detail_laporan.id_detail_laporan', 'detail_laporan.id_pelaporan','detail_laporan.jenis_laporan', 'detail_laporan.tgl_laporan')
                        ->where('id_laporan',$data)
                        ->first();
        // dd($data_user);
        return view('user/detail_laporan', ['detail_lp' => $data_user]);
    }

    public  function ubah_pw()
    {
        return view('user/ubah_pw');
    }

    public function proses_ubah_pw(Request $request){
        $request->validate([
            'pw_baru'       => 'required',
            'pw_konfirmasi' => 'required'
        ]);

        if (session('data_user')['id']) {
            if ($request->pw_baru == $request->pw_konfirmasi) {
                $update_user = tb_user::find(session('data_user')['id']);

                $update_user->password = bcrypt($request->pw_konfirmasi);
        
                $update_user->save();
                return redirect()->route('dashboard_untuk_user')->with('pw_berhasil', 'password berhasil diubah');
            }
            
        }

        return redirect()->route('ubah_pw');

        

    }

    #untuk login user

    public function proses_login_user(Request $request){
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data1 = [
            'email'     => $request->email,
            'password'  => $request->password
        ];
        $data2 = [
            'username'  => explode("@",$request->email)[0],
            'password'  => $request->password
        ];

        if (Auth::guard('tb_user')->attempt($data1) || Auth::guard('tb_user')->attempt($data2)) {
            $user = Auth::guard('tb_user')->user();
            
            $ada = [
                'id'    => $user->id_user,
                'nama'  => $user->nama
            ];
            
            session()->put('data_user', $ada);

            $data_user  = DB::table('tb_user')->where('id_user',session('data_user')['id'])->first();

            if (password_verify($data_user->username, $data_user->password)  ) {
                return redirect()->route('dashboard_untuk_user')->with('pw_sama', 'Username dan pasword sama harap diubah');
            }

            return redirect()->route('dashboard_untuk_user');
        }
        else {
            return redirect()->route('halaman_login_user')->with('failed', 'Username atau password salah!!!');
        }

    }

    public function redirect_to_provider($nama_provider){
        return Socialite::driver($nama_provider)->redirect();
    }

    public function handle_provider_callback($nama_provider){
        try {
            $data_user = Socialite::driver($nama_provider)->user();
            $cari_user = tb_user::where('id_auth', $data_user->id)
                                        ->OrWhere('email', $data_user->email)
                                        ->first();
            if ($cari_user) {
                Auth::login($cari_user);
                $ada = [
                    'id'    => $cari_user->id_user,
                    'nama'  => $cari_user->nama
                ];
                session()->put('data_user', $ada);

                $data_user  = DB::table('tb_user')->where('id_user',session('data_user')['id'])->first();

                if (password_verify($data_user->username, $data_user->password)  ) {
                    return redirect()->route('dashboard_untuk_user')->with('pw_sama', 'Username dan pasword sama harap diubah');
                }
                return redirect()->route('dashboard_untuk_user');
            }
            else {
                $akun_baru = tb_user::create([
                    'id_auth'               => $data_user->id,
                    'username'              => explode('@', $data_user->email)[0], 
                    'nama'                  => $data_user->name,
                    'email'                 => $data_user->email,
                    'alamat'                => '-',
                    'no_tlp'                => 0,
                    'tempat_tanggal_lahir'  => '-',
                    'password'              => bcrypt(explode('@', $data_user->email)[0]),
                ]);
                $cari_akun = tb_user::where('id_auth', $akun_baru->id_auth)->first();
                $ada = [
                    'id'    => $cari_akun->id_user,
                    'nama'  => $cari_akun->nama
                ];
                session()->put('data_user', $ada);
                Auth::login($akun_baru);

                $data_user  = DB::table('tb_user')->where('id_user',session('data_user')['id'])->first();

                if (password_verify($data_user->username, $data_user->password)  ) {
                    return redirect()->route('dashboard_untuk_user')->with('pw_sama', 'Username dan pasword sama harap diubah');
                }
                return redirect()->route('dashboard_untuk_user');


                
            } 
        }    
        catch (Excption $e) {
            return redirect()->route('halaman_login_user');
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


        $tambah_laporan = new tb_laporan;
        $detail_laporan = new detail_laporan_u;
        $tgl_laporan    = Carbon::now();

        $tambah_laporan->isi_laporan    = $request->isi;
        $tambah_laporan->id_pelapor     = session('data_user')['id'];
        $tambah_laporan->save();

        $detail_laporan->id_pelaporan   = $tambah_laporan->id_laporan;
        $detail_laporan->tgl_laporan    = $tgl_laporan->format('Y/m/d');
        $detail_laporan->status_laporan = 'belum diproses';

        if ($request->kriteria_laporan == 'fasilitas') {
            
            $detail_laporan->jenis_laporan  = $request->kriteria_laporan;

        }
        else{

            $detail_laporan->jenis_laporan  = $request->jenis_laporan;
        }
        
        $detail_laporan->save();
        return redirect()->route('dashboard_untuk_user')->with('laporan_berhasil', 'laporan berhasil ditambahkan');
    }
}
