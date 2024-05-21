<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cek_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('data_pa') && $request->session()->get('data_pa')['jbt'] == 'admin') {
            return $next($request);
        }

        return redirect()->route('halaman_login_pa')->with('gagal_masuk', 'Harap login terlebih dahulu!!!');
    }
}
