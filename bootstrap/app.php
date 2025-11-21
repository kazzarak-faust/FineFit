<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware; // <-- PENTING: Import class RoleMiddleware

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // DAFTARKAN MIDDLEWARE ALIAS DI SINI
        $middleware->alias([
            'role' => RoleMiddleware::class, // <-- REGISTRASI ROLE BARU ANDA
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();