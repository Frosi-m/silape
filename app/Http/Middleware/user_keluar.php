<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class user_keluar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('data_user') && $request->session()->get('data_user')['id']) {
            return redirect()->route('dashboard_untuk_user')->with('masih_masuk', 'Harap logout terlebih dahulu!!!');
        }
        return $next($request);
    }
}
