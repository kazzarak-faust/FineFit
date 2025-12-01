<?php

namespace App\Http\Controllers;

// Di sini, kita tidak perlu mengimpor Model (ProductType, Material, DesignOption) 
// karena semua logika pengambilan data kini ada di DesignCustomizer.php
use Illuminate\Routing\Controller;

class DesignController extends Controller
{
    /**
     * Menampilkan halaman Desain Kustomisasi.
     * Controller ini bertugas menampilkan view Blade yang menjadi wrapper untuk komponen Livewire.
     */
    public function index()
    {
        // Langsung tampilkan view yang memanggil komponen Livewire 'design-customizer'.
        // Jika view ini tidak ada, error akan terjadi.
        return view('design.index');
    }
}