<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'atlasadmin@gmail.com'],
            [
                'name' => 'Atlas Administrador',
                'password' => Hash::make('Atl@s@#2026'),
                'email_verified_at' => now(),
            ]
        );
    }
}
