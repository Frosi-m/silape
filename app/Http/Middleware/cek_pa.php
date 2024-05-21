<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cek_pa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('data_pa') && $request->session('data_pa')['jbt'] == 'admin') {
            return redirect()->route('da_admin');
        }
        elseif($request->session()->has('data_pa') && $request->session('data_pa')['jbt'] != 'admin') {
            return redirect()->route('dashboard_petugas');
        }
        return redirect()->route('halaman_login_pa')->with('gagal_masuk', 'Harap login terlebih dahulu!!!');
    }
}
