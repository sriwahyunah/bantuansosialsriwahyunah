<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BantuanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bantuans')->insert([

            [
                'nama_bantuan' => 'Bantuan Sembako',
                'total_dana' => 10000000,
                'dana_tersisa' => 10000000,
                'kuota_penerima' => 100,
                'jumlah_sudah_mengambil' => 0,
                'status' => 'Tersedia',
                'deskripsi' => 'Bantuan sembako masyarakat',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_bantuan' => 'Bantuan Pendidikan',
                'total_dana' => 20000000,
                'dana_tersisa' => 20000000,
                'kuota_penerima' => 50,
                'jumlah_sudah_mengambil' => 0,
                'status' => 'Tersedia',
                'deskripsi' => 'Bantuan biaya sekolah',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}