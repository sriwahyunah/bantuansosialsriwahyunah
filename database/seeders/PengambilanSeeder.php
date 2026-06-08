<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengambilanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengambilans')->insert([

            [
                'bantuan_id' => 1,
                'masyarakat_id' => 1,
                'jumlah_diterima' => 500000,
                'tanggal_pengambilan' => now(),
                'status' => 'Sudah Diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}