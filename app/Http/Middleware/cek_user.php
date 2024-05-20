<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\tb_user;

class cek_user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('data_user') && $request->session()->get('data_user')['id']) {
            return $next($request);
        }
        return redirect()->route('halaman_login_user')->with('gagal_masuk', 'Harap login terlebih dahulu!!!');
    }
}
