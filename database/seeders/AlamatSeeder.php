<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('alamats')->insert([
            [
                'user_id'   => 5,
                'nama'      => 'Budi Santoso',
                'nomer'     => '081234567890',
                'alamat'    => 'Jl. Merdeka No. 123, RT 05 RW 03',
                'kota'      => 'Bandung',
                'provinsi'  => 'Jawa Barat',
                'patokan'   => 'Dekat Taman Kota',
                'isdefault' => true,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'user_id'   => 4,
                'nama'      => 'Siti Rahmawati',
                'nomer'     => '082198765432',
                'alamat'    => 'Jl. Sudirman No. 45',
                'kota'      => 'Surabaya',
                'provinsi'  => 'Jawa Timur',
                'patokan'   => 'Sebelah Indomaret',
                'isdefault' => false,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}
