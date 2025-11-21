<?php

namespace App\Http\Controllers; // Pastikan namespace ini sudah benar

use App\Models\DesignConfiguration; // Mengambil item dari keranjang
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller; // Menggunakan Controller Induk

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman Checkout.
     */
    public function index()
    {
        $userId = Auth::id();
        
        // 1. Ambil semua item yang ada di keranjang (status 'In Cart') milik pengguna
        // Kita asumsikan relasi sudah dibuat untuk mendapatkan item desain yang dikustom.
        $cartItems = DesignConfiguration::where('user_id', $userId)
                                      ->where('status', 'In Cart')
                                      ->get();

        // Cek jika keranjang kosong
        if ($cartItems->isEmpty()) {
            // Arahkan kembali ke halaman design jika tidak ada item
            return redirect()->route('design.index')->with('warning', 'Keranjang Anda kosong. Silakan desain pakaian Anda terlebih dahulu!');
        }
        
        // 2. Lakukan Perhitungan Total
        $subtotal = $cartItems->sum('final_price');
        
        // Nilai contoh untuk tampilan checkout
        $shippingCost = 50000; 
        $taxRate = 0.10; // PPN 10%
        
        $tax = $subtotal * $taxRate;
        $totalAmount = $subtotal + $shippingCost + $tax;

        // 3. Kirim data ke view
        return view('checkout.index', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'shippingCost' => $shippingCost,
            'tax' => $tax,
            'totalAmount' => $totalAmount,
        ]);
    }
    
    /**
     * Memproses pengiriman formulir checkout dan menyimpan pesanan.
     */
    public function store(Request $request)
    {
        // TO DO: LOGIKA PEMROSESAN PESANAN DI SINI
        // 1. Validasi Request (Alamat, Metode Pembayaran)
        // 2. Simpan Alamat (Model Address)
        // 3. Buat Order Baru (Model Order)
        // 4. Buat OrderItem Baru untuk setiap item keranjang (Model OrderItem)
        // 5. Update Status DesignConfiguration menjadi 'Ordered'
        // 6. Redirect ke Payment Gateway
        
        // Untuk saat ini, hanya redirect sukses
        return redirect()->route('tracking.index')->with('success', 'Pesanan berhasil dibuat! Menunggu pembayaran.');
    }
}