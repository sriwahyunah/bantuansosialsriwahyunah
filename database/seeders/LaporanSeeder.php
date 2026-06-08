<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('laporans')->insert([

            [
                'judul' => 'Laporan Bantuan Bulanan',
                'isi_laporan' => 'Laporan penyaluran bantuan bulan ini',
                'tanggal_laporan' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}