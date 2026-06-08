<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MasyarakatSeeder::class,
            BantuanSeeder::class,
            PengajuanSeeder::class,
            PengambilanSeeder::class,
            EventBantuanSeeder::class,
            LaporanSeeder::class,
            PenyaluranSeeder ::class,
            VerifikasiSeeder::class,
        ]);
    }
}