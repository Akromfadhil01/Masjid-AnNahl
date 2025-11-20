<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hanya buat 1 user admin, tidak ada data dummy lainnya
        
        // Cek apakah admin sudah ada
        if (!User::where('email', 'admin@masjid.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@masjid.com',
                'password' => Hash::make('password123'),
            ]);
            
            $this->command->info('✅ Admin user berhasil dibuat!');
            $this->command->info('📧 Email: admin@masjid.com');
            $this->command->info('🔑 Password: password123');
        } else {
            $this->command->warn('⚠️  Admin user sudah ada, skip...');
        }
        
        // SEMUA DATA LAIN AKAN DIISI MANUAL VIA ADMIN PANEL
        // Tidak ada dummy data untuk:
        // - Prayer Times (diisi manual)
        // - Activities (diisi manual)
        // - News (diisi manual)
        // - Galleries (diisi manual)
        // - Donation Accounts (diisi manual)
    }
}