<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matakuliah extends Model
{
    use HasFactory;

    /**
     * Tentukan nama tabel jika tidak mengikuti konvensi Laravel (opsional).
     * Migration Anda menggunakan 'matakuliah' (singular),
     * jadi kita perlu menetapkannya secara eksplisit.
     */
    protected $table = 'matakuliah';

    /**
     * Kolom yang boleh diisi secara massal (mass assignable).
     */
    protected $fillable = [
        'Nama_matakuliah',
        'Semester',
        'Jumlah_sks',
        'prodi_id',
        'dosen_id',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }


    // Relasi ke model Dosen.
    // Satu Matakuliah diajar oleh satu Dosen.

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
