<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'user_masuk'    => \App\Http\Middleware\cek_user::class,
            'user_keluar'   => \App\Http\Middleware\user_keluar::class,
            'admin_masuk'   => \App\Http\Middleware\cek_admin::class,
            'petugas_masuk' => \App\Http\Middleware\cek_petugas::class,
            'admin_keluar'  => \App\Http\Middleware\pa_keluar::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
