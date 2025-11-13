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
                'deskripsi' => json_encode([
                    'Cocok untuk pengguna baru',
                    'Akses fitur dasar',
                    'Tanpa dukungan prioritas'
                ]),
                'bonus' => json_encode([
                    '1 hari akses premium tambahan',
                    'E-book panduan pengguna baru'
                ]),
                'Populer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe_paket' => 'Premium',
                'harga' => 150000,
                'deskripsi' => json_encode([
                    'Akses semua fitur',
                    'Dukungan prioritas 24 jam',
                    'Tanpa batasan penggunaan'
                ]),
                'bonus' => json_encode([
                    'Merchandise eksklusif',
                    'Diskon 10% untuk perpanjangan'
                ]),
                'Populer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe_paket' => 'Pro',
                'harga' => 250000,
                'deskripsi' => json_encode([
                    'Untuk pengguna profesional',
                    'Analisis performa lanjutan',
                    'Integrasi API'
                ]),
                'bonus' => json_encode([
                    '3 hari akses tambahan',
                    'Layanan konsultasi khusus'
                ]),
                'Populer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe_paket' => 'Eksekutif',
                'harga' => 350000,
                'deskripsi' => json_encode([
                    'Paket lengkap dan personalisasi fitur',
                    'Konsultan pribadi dan layanan premium'
                ]),
                'bonus' => json_encode([
                    '5 hari akses tambahan',
                    'Hadiah eksklusif',
                    'Prioritas utama'
                ]),
                'Populer' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
