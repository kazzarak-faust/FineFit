<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('login');
        }

        // 2. Ambil peran pengguna saat ini
        $userRole = Auth::user()->role;

        // 3. Bandingkan peran pengguna dengan peran yang dibutuhkan ($role)
        if ($userRole !== $role) {
            // Jika peran tidak sesuai, arahkan ke halaman utama atau tampilkan 403 Forbidden
            // Untuk FineFit, kita arahkan ke Home dengan pesan error.
            return redirect('/')->with('error', 'Akses ditolak. Anda tidak memiliki izin sebagai ' . $role . '.');
        }

        return $next($request);
    }
}