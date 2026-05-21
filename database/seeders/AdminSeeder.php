<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cetako.com'],
            [
                'name' => 'Admin Cetako',
                'password' => Hash::make('cetako2026'),
            ]
        );
    }
}
