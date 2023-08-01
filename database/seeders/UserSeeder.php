<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => Str::uuid(),
            'name' => 'admin',
            'email' => 'pudingbesar@gmail.com',
            'password' => '$2y$10$7TzNGtCN4d6JinVrmUAy8e55bdQyHdp95Plrne6QJ5L3i4QtObare',
            'role' => 'admin'
        ]);
    }
}