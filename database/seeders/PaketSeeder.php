<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pakets')->insert([
            [
                'tipe_paket' => 'Basic',
                'harga' => 50000,
                'deskripsi' => 'Paket dasar dengan fitur standar untuk pengguna baru.',
                'bonus' => 'Bonus 1 hari tambahan akses premium.',
                'Populer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe_paket' => 'Premium',
                'harga' => 150000,
                'deskripsi' => 'Paket premium dengan semua fitur lengkap dan dukungan prioritas.',
                'bonus' => 'Bonus merchandise eksklusif.',
                'Populer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe_paket' => 'Pro',
                'harga' => 250000,
                'deskripsi' => 'Paket profesional untuk pengguna dengan kebutuhan lanjutan.',
                'bonus' => 'Bonus 3 hari akses tambahan + layanan khusus.',
                'Populer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
