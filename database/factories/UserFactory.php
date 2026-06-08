<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),

            'username' => fake()->unique()->userName(),

            'password' => Hash::make('password'),

            'role' => 'masyarakat',
        ];
    }
}