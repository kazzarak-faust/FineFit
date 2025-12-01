<?php

namespace App\Http\Controllers;
use App\Models\Material;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; 

class Controller extends BaseController
{
    public function index()
    {
        // Ambil material yang ditandai sebagai 'featured' (is_featured = true)
        $featuredMaterials = Material::where('is_featured', true)->get();

        // Data statis untuk bagian komunitas (bisa dikembangkan menjadi Model Review)
        $communityReviews = [
            ['name' => 'Jasmine Lee', 'quote' => '“The 3D preview made my custom jacket perfect on the first try.”'],
            ['name' => 'Marco', 'quote' => '“Premium fabrics and fast ordering, I’m hooked.”'],
            ['name' => 'Anita', 'quote' => '“Designing felt effortless. The fit was spot on.”'],
        ];

        return view('home', [
            'featuredMaterials' => $featuredMaterials,
            'communityReviews' => $communityReviews,
        ]);
    }
}