<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('materials')->insert([
            [
                'name' => 'Cotton',
                'description' => 'Soft and breathable',
                'price_per_unit' => 45000.00,
                'image_url' => '/images/fabrics/cotton.jpg', // Ganti dengan path gambar Anda
                'is_featured' => true,
            ],
            [
                'name' => 'Linen',
                'description' => 'Airy and elegant drape',
                'price_per_unit' => 65000.00,
                'image_url' => '/images/fabrics/linen.jpg',
                'is_featured' => true,
            ],
            [
                'name' => 'Denim',
                'description' => 'Durable and timeless',
                'price_per_unit' => 80000.00,
                'image_url' => '/images/fabrics/denim.jpg',
                'is_featured' => true,
            ],
        ]);
    }
}