<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Verifikasi;

class VerifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Verifikasi::create([

            'pengajuan_id' => 1,

            'status' => 'Disetujui',

            'catatan' => 'Data masyarakat lengkap',

            'tanggal_verifikasi' => now(),

        ]);

        Verifikasi::create([

            'pengajuan_id' => 2,

            'status' => 'Diproses',

            'catatan' => 'Menunggu pemeriksaan petugas',

            'tanggal_verifikasi' => now(),

        ]);

        Verifikasi::create([

            'pengajuan_id' => 3,

            'status' => 'Ditolak',

            'catatan' => 'Tidak memenuhi syarat bantuan',

            'tanggal_verifikasi' => now(),

        ]);
    }
}