<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate dummy image
        $imageName = 'produk_' . Str::random(8) . '.jpg';
        $imagePath = 'produk/' . $imageName;

        // Simpan gambar dummy 300x300
        Storage::disk('public')->put(
            $imagePath,
            file_get_contents('https://picsum.photos/300')
        );

        return [
            'nama'         => $this->faker->words(2, true),
            'kategori_id'  => \App\Models\Kategori::inRandomOrder()->first()->id ?? 1,
            'gambar'       => $imagePath,
            'gambar_detail' => $imagePath,
            'deskripsi'    => $this->faker->paragraph(),
            'harga'        => $this->faker->numberBetween(10000, 150000),
            'stok'         => $this->faker->numberBetween(1, 100),
            'status_stok'  => $this->faker->randomElement(['tersedia', 'tidak tersedia']),
        ];
    }
}
