<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- Import DB Facade

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama (jika ada) sebelum seeding
        Fakultas::create([
            'nama_fakultas' => 'Fakultas Teknik',
            'kode_fakultas' => 'FT'
        ]);

        // Masukkan data baru
        DB::table('fakultas')->insert([
            [
                'nama_fakultas' => 'Fakultas Teknik',
                'kode_fakultas' => 'FT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'kode_fakultas' => 'FEB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_fakultas' => 'Fakultas Ilmu Komputer',
                'kode_fakultas' => 'FILKOM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_fakultas' => 'Fakultas Kesehatan',
                'kode_fakultas' => 'FK',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
