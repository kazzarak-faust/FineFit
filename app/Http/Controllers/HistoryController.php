<?php

namespace App\Http\Controllers; // Pastikan namespace ini ada

use App\Models\Order; // Import Model Order
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth; // Import Facade Auth

class HistoryController extends Controller
{
    public function index()
    {
        // 1. Ambil ID pengguna yang sedang login
        $userId = Auth::id();
        
        // 2. Ambil semua pesanan (orders) yang dimiliki oleh pengguna ini
        // Menggunakan Model Order, kita mencari semua record dengan user_id yang cocok.
        // latest() memastikan pesanan terbaru muncul di urutan pertama.
        $orders = Order::where('user_id', $userId)
                        ->latest()
                        ->get();

        // Alternatif yang lebih "Eloquent" (jika Anda sudah mendefinisikan relationship orders() di Model User)
        /*
        $orders = Auth::user()->orders()->latest()->get();
        */

        // 3. Kirim data pesanan ke view
        return view('livewire.history.index', [
            'orders' => $orders,
        ]);
    }
}