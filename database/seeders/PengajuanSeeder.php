<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengajuans')->insert([

            [
                'masyarakat_id' => 1,
                'bantuan_id' => 1,
                'tanggal_pengajuan' => now(),
                'status' => 'Disetujui',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'masyarakat_id' => 3,
                'bantuan_id' => 2,
                'tanggal_pengajuan' => now(),
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}