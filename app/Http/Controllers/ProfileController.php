<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    /**
     * Menampilkan formulir edit profil pengguna.
     */
    public function edit(Request $request): View
    {
        // View 'profile.edit' di Livewire Breeze biasanya me-render view yang mengandung
        // komponen Livewire/Volt untuk update profil, password, dan hapus akun.
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Menghapus akun pengguna.
     * (Logic sebenarnya ada di class Volt/Livewire, Controller ini hanya wrapper)
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi password sebelum menghapus
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logout dan Hapus Akun
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Akun Anda telah berhasil dihapus.');
    }

    // Metode 'update' tidak perlu didefinisikan secara eksplisit di sini 
    // jika Anda menggunakan Livewire/Volt karena proses PATCH/PUT 
    // biasanya langsung ditangani oleh komponen di view.
    // Namun, jika diperlukan, Anda bisa menambahkan stubs.
}