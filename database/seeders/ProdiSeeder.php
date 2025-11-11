<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;
use App\Models\Fakultas;

class ProdiSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PENTING: JANGAN ADA TRUNCATE DI SINI
        // Prodi::truncate(); // <-- INI SUDAH DIHAPUS KARENA PINDAH KE DatabaseSeeder.php

        // 2. Ambil data fakultas yang relevan
        // Pastikan kode ini (FT, FEB, FILKOM, FIK) SAMA dengan di FakultasSeeder
        $ft = Fakultas::where('kode_fakultas', 'FT')->first();
        $feb = Fakultas::where('kode_fakultas', 'FEB')->first();
        $filkom = Fakultas::where('kode_fakultas', 'FILKOM')->first();
        $fik = Fakultas::where('kode_fakultas', 'FIK')->first(); // Kita pakai FIK

        // 3. Buat data prodi
        // (Kita cek dulu apakah fakultasnya ada sebelum mengambil ->id)

        if ($ft) {
            Prodi::create([
                'nama_prodi' => 'Teknik Informatika',
                'kode_prodi' => 'TIF',
                'fakultas_id' => $ft->id
            ]);

            Prodi::create([
                'nama_prodi' => 'Teknik Elektro',
                'kode_prodi' => 'TE',
                'fakultas_id' => $ft->id
            ]);

            Prodi::create([
                'nama_prodi' => 'Teknik Industri',
                'kode_prodi' => 'TI',
                'fakultas_id' => $ft->id
            ]);

            Prodi::create([
                'nama_prodi' => 'Teknik Sipil',
                'kode_prodi' => 'TS',
                'fakultas_id' => $ft->id
            ]);
        }

        if ($feb) {
            Prodi::create([
                'nama_prodi' => 'Manajemen',
                'kode_prodi' => 'MAN',
                'fakultas_id' => $feb->id
            ]);

            Prodi::create([
                'nama_prodi' => 'Akuntansi',
                'kode_prodi' => 'AK',
                'fakultas_id' => $feb->id
            ]);
        }

        if ($filkom) {
            Prodi::create([
                'nama_prodi' => 'Sistem Informasi',
                'kode_prodi' => 'SI',
                'fakultas_id' => $filkom->id
            ]);
        }

        if ($fik) {
            Prodi::create([
                'nama_prodi' => 'Ilmu Keperawatan',
                'kode_prodi' => 'KEP',
                'fakultas_id' => $fik->id
            ]);

            Prodi::create([
                'nama_prodi' => 'Kesehatan Masyarakat',
                'kode_prodi' => 'KESMAS',
                'fakultas_id' => $fik->id
            ]);

            Prodi::create([
                'nama_prodi' => 'Ilmu Gizi',
                'kode_prodi' => 'GIZI',
                'fakultas_id' => $fik->id
            ]);

            Prodi::create([
                'nama_prodi' => 'Farmasi',
                'kode_prodi' => 'FARM',
                'fakultas_id' => $fik->id
            ]);

            Prodi::create([
                'nama_prodi' => 'Kebidanan',
                'kode_prodi' => 'BIDAN',
                'fakultas_id' => $fik->id
            ]);
        }
    }
}
