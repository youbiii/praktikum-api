<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    /**
     * Tentukan nama tabel secara eksplisit.
     */
    protected $table = 'krs';

    /**
     * Kolom yang boleh diisi secara massal (mass assignable).
     */
    protected $fillable = [
        'mahasiswa_id',
        'matakuliah_id',
        'dosen_pa_id',
        'tahun_akademik',
        'semester_diambil',
        'status', // Sesuai migrasi Anda
        'nilai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }

    public function dosenPa()
    {

        return $this->belongsTo(Dosen::class, 'dosen_pa_id');
    }
}
