<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder data kustomisasi
        $this->call([
            DesignDataSeeder::class, // <-- Pemanggilan DesignDataSeeder
            // Tambahkan UserSeeder::class jika Anda punya seeder user di masa depan
        ]);
    }
}