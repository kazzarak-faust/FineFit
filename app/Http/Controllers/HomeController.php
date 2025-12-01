<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman Home dengan data katalog dan review.
     */
    public function index()
    {
        // 1. Ambil Featured Materials (sesuai yang di-seed sebelumnya)
        $featuredMaterials = Material::where('is_featured', true)->get();

        // 2. Data Review Komunitas (Untuk saat ini, masih data statis)
        $communityReviews = [
            ['name' => 'Jasmine Lee', 'quote' => 'The 3D preview made my custom jacket perfect on the first try.'],
            ['name' => 'Marco', 'quote' => 'Premium fabrics and fast ordering, I’m hooked.'],
            ['name' => 'Anita', 'quote' => 'Designing felt effortless. The fit was spot on.'],
        ];

        return view('home', [
            'featuredMaterials' => $featuredMaterials,
            'communityReviews' => $communityReviews,
        ]);
    }
}