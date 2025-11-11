<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

/**
 * Class ini menangani ekspor data SATU mahasiswa untuk Maatwebsite/Excel
 * - FromQuery: Mengambil data menggunakan query Eloquent
 * - WithHeadings: Menentukan nama kolom (header) di Excel
 * - WithMapping: Memetakan (mengubah) data dari Eloquent collection menjadi array
 * - ShouldAutoSize: Membuat lebar kolom otomatis
 */
class MahasiswaExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $id;

    /**
     * Terima ID mahasiswa dari Controller
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function query()
    {
        // Kita ambil data mahasiswa spesifik berdasarkan ID, beserta relasinya
        return Mahasiswa::with('prodi', 'dosenPA')->where('id', $this->id);
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        // Ini akan menjadi baris pertama (header) di file Excel
        return [
            'NIM',
            'Nama Mahasiswa',
            'Email',
            'Program Studi',
            'Dosen PA',
            'NIDN Dosen PA',
            'Jenis Kelamin',
            'No HP',
            'Alamat',
        ];
    }

    /**
    * @param mixed $mahasiswa (variabel ini otomatis berisi hasil dari query())
    *
    * @return array
    */
    public function map($mahasiswa): array
    {
        // Ini adalah baris data yang akan ditampilkan,
        // sesuaikan urutannya dengan headings()
        return [
            $mahasiswa->NIM,
            $mahasiswa->Nama_Mahasiswa,
            $mahasiswa->Email,
            $mahasiswa->prodi?->nama_prodi ?? '— Tidak Ada —',
            $mahasiswa->dosenPA?->Nama_Dosen ?? '— Tidak Ada —',
            $mahasiswa->dosenPA?->NIDN ?? '—',
            $mahasiswa->Jenis_Kelamin ?? '— Tidak Ada —',
            $mahasiswa->No_HP ?? '— Tidak Ada —',
            $mahasiswa->Alamat ?? '— Tidak Ada —',
        ];
    }
}

