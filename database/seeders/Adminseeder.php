<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // atau App\Models\Admin

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );
    }
}
