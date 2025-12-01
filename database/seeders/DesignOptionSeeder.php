<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignOptionSeeder extends Seeder
{
    public function run(): void
    {
        // Models
        DB::table('design_options')->insert([
            ['category' => 'Model', 'name' => 'T-Shirt'],
            ['category' => 'Model', 'name' => 'Hoodie'],
            ['category' => 'Model', 'name' => 'Dress'],
            ['category' => 'Model', 'name' => 'Jacket'],
        ]);

        // Fabric
        DB::table('design_options')->insert([
            ['category' => 'Fabric', 'name' => 'Cotton'],
            ['category' => 'Fabric', 'name' => 'Linen'],
            ['category' => 'Fabric', 'name' => 'Denim'],
            ['category' => 'Fabric', 'name' => 'Tweed'],
        ]);

        // Colors (pakai metadata hex)
        DB::table('design_options')->insert([
            ['category' => 'Color', 'name' => 'Black', 'metadata' => json_encode(['hex' => '#000000'])],
            ['category' => 'Color', 'name' => 'White', 'metadata' => json_encode(['hex' => '#FFFFFF'])],
            ['category' => 'Color', 'name' => 'Red',   'metadata' => json_encode(['hex' => '#FF0000'])],
            ['category' => 'Color', 'name' => 'Blue',  'metadata' => json_encode(['hex' => '#0000FF'])],
        ]);

        // Patterns
        DB::table('design_options')->insert([
            ['category' => 'Pattern', 'name' => 'Solid'],
            ['category' => 'Pattern', 'name' => 'Striped'],
            ['category' => 'Pattern', 'name' => 'Checked'],
            ['category' => 'Pattern', 'name' => 'Floral'],
        ]);

        // Sizes
        DB::table('design_options')->insert([
            ['category' => 'Size', 'name' => 'Normal'],
            ['category' => 'Size', 'name' => 'Oversized'],
            ['category' => 'Size', 'name' => 'Slim Fit'],
        ]);

        // Custom Details
        DB::table('design_options')->insert([
            ['category' => 'Custom Detail', 'sub_category' => 'Pocket', 'name' => 'Left Pocket'],
            ['category' => 'Custom Detail', 'sub_category' => 'Pocket', 'name' => 'Right Pocket'],
            ['category' => 'Custom Detail', 'sub_category' => 'Embroidery', 'name' => 'Text Embroidery'],
            ['category' => 'Custom Detail', 'sub_category' => 'Others', 'name' => 'Extra Button'],
        ]);
    }
}
