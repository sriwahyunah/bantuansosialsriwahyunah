<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventBantuan;

class EventBantuanSeeder extends Seeder
{
    public function run(): void
    {
        EventBantuan::insert([

            [
                'nama_event' => 'Penyaluran Bantuan Sembako',
                'deskripsi' => 'Program bantuan sembako untuk keluarga kurang mampu.',
                'lokasi' => 'Kecamatan Sukmajaya',
                'tanggal_mulai' => '2026-06-15',
                'tanggal_selesai' => '2026-06-15',
                'jenis_bantuan' => 'Sembako',
                'kuota' => 250,
                'peserta' => 180,
                'status' => 'akan_datang',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_event' => 'Bantuan Pendidikan',
                'deskripsi' => 'Penyaluran bantuan pendidikan siswa.',
                'lokasi' => 'Kecamatan Cilodong',
                'tanggal_mulai' => '2026-06-02',
                'tanggal_selesai' => '2026-06-10',
                'jenis_bantuan' => 'Pendidikan',
                'kuota' => 120,
                'peserta' => 95,
                'status' => 'berlangsung',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_event' => 'Bantuan Kesehatan',
                'deskripsi' => 'Pemeriksaan kesehatan gratis.',
                'lokasi' => 'Kecamatan Pancoran Mas',
                'tanggal_mulai' => '2026-06-20',
                'tanggal_selesai' => '2026-06-20',
                'jenis_bantuan' => 'Kesehatan',
                'kuota' => 300,
                'peserta' => 0,
                'status' => 'akan_datang',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_event' => 'Perbaikan Rumah Layak Huni',
                'deskripsi' => 'Program renovasi rumah warga kurang mampu.',
                'lokasi' => 'Kecamatan Beji',
                'tanggal_mulai' => '2026-05-25',
                'tanggal_selesai' => '2026-05-25',
                'jenis_bantuan' => 'Perumahan',
                'kuota' => 15,
                'peserta' => 15,
                'status' => 'selesai',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}