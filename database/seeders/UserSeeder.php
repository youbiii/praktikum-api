<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        // Hapus data user lama jika ada (opsional, tapi disarankan)
        User::truncate();

        // Buat user default (misalnya Admin)
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Selalu HASH password!
        ]);

        // Buat user testing lain jika perlu
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
        ]);

        // Anda bisa tambahkan user lain di sini...
    }
}
