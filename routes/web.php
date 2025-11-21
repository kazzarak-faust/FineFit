<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::view('dashboard', 'dashboard')
        ->middleware('verified')
        ->name('dashboard');

    // 1. Rute Fitur Inti FineFit
    
    // Design Page (Hanya bisa diakses oleh Customer)
    // Catatan: Middleware 'role:customer' harus Anda buat secara manual.
    Route::view('design', 'design.index') 
        ->middleware('role:customer') 
        ->name('design.index');

    // Checkout Page
    // Akan menggunakan CheckoutController@index atau serupa.
    Route::view('checkout', 'checkout.index')
        ->name('checkout.index');

    // History Page
    // Menggunakan HistoryController untuk mengambil data pesanan pengguna.
    Route::get('/history', [HistoryController::class, 'index'])
        ->name('history.index');


    Route::get('tracking', [TrackingController::class, 'index'])
    ->name('tracking.index');
    // 2. Rute Manajemen Akun (Profile)
    
    // Rute Profile standar dari Laravel Breeze, menggunakan ProfileController
    // GET: Menampilkan halaman edit profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // PATCH: Memproses formulir update data profile (Nama, Email, dll.)
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // DELETE: Menghapus akun
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';