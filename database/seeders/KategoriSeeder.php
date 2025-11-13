<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        kategori::create([
            'nama' => 'Default',
            'deskripsi' => 'Kategori default sistem'
        ]);

        // Generate kategori random (5 data)
        Kategori::factory()->count(5)->create();
    }
}
