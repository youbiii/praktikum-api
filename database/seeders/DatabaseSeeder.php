<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; // Wajib ada

// --- 1. Impor SEMUA model Anda ---
use App\Models\User;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Jabatan;
use App\Models\Mahasiswa; // Wajib ada
use App\Models\Dosen;     // Wajib ada

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 2. Matikan Foreign Key Check
        Schema::disableForeignKeyConstraints();

        // 3. Kosongkan tabel (TRUNCATE)
        //    URUTAN: Dari "anak" (paling banyak relasi) ke "induk" (paling atas)

        // --- Hapus "anak" dulu ---
        Mahasiswa::truncate(); // Anak dari Prodi
        Dosen::truncate();     // Anak dari Jabatan

        // --- Hapus "induk" level 1 ---
        Prodi::truncate();     // Induk dari Mahasiswa, Anak dari Fakultas

        // --- Hapus "induk" paling atas ---
        Fakultas::truncate();  // Induk dari Prodi
        Jabatan::truncate();   // Induk dari Dosen
        User::truncate();      // Tidak punya relasi

        // 4. Nyalakan lagi Foreign Key Check
        Schema::enableForeignKeyConstraints();

        // 5. Panggil Seeder (CALL)
        //    URUTAN: Dari "induk" ke "anak"
        $this->call([
            // --- Induk dulu ---
            UserSeeder::class,
            FakultasSeeder::class,
            JabatanSeeder::class,

            // --- Baru "anak" ---
            ProdiSeeder::class,    // Butuh FakultasSeeder selesai
            // DosenSeeder::class, // (Panggil ini jika Anda membuatnya, butuh JabatanSeeder)
            // MahasiswaSeeder::class, // (Panggil ini jika Anda membuatnya, butuh ProdiSeeder)
        ]);
    }
}
