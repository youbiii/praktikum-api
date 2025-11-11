<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- Import DB Facade

class JabatanSeeder extends Seeder
{

    public function run(): void
    {
        // Hapus data lama (jika ada) sebelum seeding
        $ft = Fakultas::where('kode_fakultas', 'FT')->first();

        // Masukkan data baru
        DB::table('jabatans')->insert([
            [
                'nama_jabatan' => 'Rektor',
                'kode_jabatan' => 'REK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jabatan' => 'Dekan',
                'kode_jabatan' => 'DEK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jabatan' => 'Wakil Dekan',
                'kode_jabatan' => 'WADEK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jabatan' => 'Ketua Jurusan',
                'kode_jabatan' => 'KAJUR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jabatan' => 'Ketua Program Studi',
                'kode_jabatan' => 'KAPRODI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jabatan' => 'Dosen',
                'kode_jabatan' => 'DOS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan jabatan lain di sini...
        ]);
    }
}
