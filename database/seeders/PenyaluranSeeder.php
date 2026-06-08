<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penyaluran;

class PenyaluranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penyaluran::create([

            'bantuan_id' => 1,

            'masyarakat_id' => 1,

            'jumlah_disalurkan' => 500000,

            'tanggal_penyaluran' => now(),

            'status' => 'Selesai',

        ]);

        Penyaluran::create([

            'bantuan_id' => 2,

            'masyarakat_id' => 2,

            'jumlah_disalurkan' => 300000,

            'tanggal_penyaluran' => now(),

            'status' => 'Diproses',

        ]);
    }
}