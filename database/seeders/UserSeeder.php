<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'nama' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Petugas Bantuan',
                'username' => 'petugas',
                'password' => Hash::make('petugas123'),
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Masyarakat',
                'username' => 'masyarakat',
                'password' => Hash::make('masyarakat123'),
                'role' => 'masyarakat',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}