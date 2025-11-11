<?php

namespace App\Exports;

use App\Models\Dosen; // Ganti ke model Dosen
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

/**
 * Class ini menangani ekspor data SATU dosen
 */
class DosenExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $id;

    /**
     * Terima ID dosen dari Controller
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
        // Query data dosen spesifik berdasarkan ID, beserta relasi 'jabatan'
        return Dosen::with('jabatan')->where('id', $this->id);
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        // Header untuk file Excel Dosen
        return [
            'NIDN',
            'Nama Dosen',
            'Email',
            'Jabatan',
            'Gelar',
            'No HP',
            'Alamat',
        ];
    }

    /**
    * @param mixed $dosen (hasil dari query())
    *
    * @return array
    */
    public function map($dosen): array
    {
        // Mapping data Dosen sesuai urutan headings()
        return [
            $dosen->NIDN,
            $dosen->Nama_Dosen,
            $dosen->Email,
            $dosen->jabatan?->nama_jabatan ?? '— Tidak Ada —',
            $dosen->Gelar ?? '— Tidak Ada —',
            $dosen->No_HP ?? '— Tidak Ada —',
            $dosen->Alamat ?? '— Tidak Ada —',
        ];
    }
}
