<?php

namespace Database\Seeders;

// Impor model User dan juga Str jika diperlukan, meskipun tidak untuk seeder ini
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah user dengan email tersebut sudah ada
        // Ini untuk mencegah duplikasi data jika seeder dijalankan berkali-kali
        if (User::where('email', 'superadmin@example.com')->doesntExist()) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => 'password', // Akan di-hash otomatis oleh model
            ]);

            $this->command->info('User superadmin@example.com berhasil dibuat.');
        } else {
            $this->command->info('User superadmin@example.com sudah ada.');
        }
    }
}