<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class TrackingController extends Controller
{
    /**
     * Menampilkan daftar pesanan untuk dilacak atau detail pelacakan.
     * Kita asumsikan method ini menampilkan daftar pesanan yang sedang diproses.
     */
    public function index()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();
        
        // Ambil pesanan yang statusnya 'Processing' atau 'In Production'
        $trackingOrders = Order::where('user_id', $userId)
                                ->whereIn('status', ['Processing', 'In Production', 'Quality Control', 'Shipped'])
                                ->latest()
                                ->get();
                                
        // Kirim data ke view tracking/index.blade.php
        return view('livewire.tracking.index', [
            'trackingOrders' => $trackingOrders,
        ]);
    }
    
    /**
     * Menampilkan detail pelacakan untuk satu pesanan berdasarkan ID.
     * (Opsional, jika Anda ingin route /tracking/{order})
     */
    public function show(string $id)
    {
        // Temukan pesanan berdasarkan ID dan pastikan itu milik pengguna yang login
        $order = Order::where('id', $id)
                      ->where('user_id', Auth::id())
                      ->with('orderItems') // Load detail item yang dipesan
                      ->firstOrFail(); // Jika tidak ditemukan, lempar 404
        
        // Di sini Anda bisa menambahkan logika untuk menampilkan progres jahit/pengiriman
        
        return view('tracking.show', compact('order'));
    }
}