<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class pa_keluar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('data_pa') && $request->session()->get('data_pa')['jbt'] == 'admin') {
            return redirect()->route('da_admin')->with('masih_masuk', 'Harap logout terlebih dahulu!!!');
        }
        elseif ($request->session()->has('data_pa') && $request->session()->get('data_pa')['jbt'] != 'admin') {
            return redirect()->route('dashboard_petugas')->with('masih_masuk', 'Harap logout terlebih dahulu!!!');
        }
        return $next($request);
    }
}
