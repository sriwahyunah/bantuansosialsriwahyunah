<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasyarakatSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('masyarakats')->insert([

            [
                'nik' => '1111111111111111',
                'nama' => 'Andi Saputra',
                'alamat' => 'Takengon',
                'pekerjaan' => 'Buruh',
                'gaji' => 1500000,
                'total_harta' => 10000000,
                'jumlah_kendaraan' => 1,
                'status_rumah' => 'Kontrak',
                'status_kelayakan' => 'Layak',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nik' => '2222222222222222',
                'nama' => 'Budi Santoso',
                'alamat' => 'Aceh Tengah',
                'pekerjaan' => 'Pengusaha',
                'gaji' => 1500000,
                'total_harta' => 300000000,
                'jumlah_kendaraan' => 3,
                'status_rumah' => 'Milik Sendiri',
                'status_kelayakan' => 'Tidak Layak',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nik' => '3333333333333333',
                'nama' => 'Citra Dewi',
                'alamat' => 'Bebesen',
                'pekerjaan' => 'Pedagang',
                'gaji' => 1800000,
                'total_harta' => 15000000,
                'jumlah_kendaraan' => 1,
                'status_rumah' => 'Menumpang',
                'status_kelayakan' => 'Layak',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}