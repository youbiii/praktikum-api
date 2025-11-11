<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosens';
    protected $fillable = [
        'Nama_Dosen',
        'NIDN',
        'Email',
        'No_HP',
        'Alamat',
        'jabatan_id',
        'Gelar',
    ];

    public function jabatan()
    {
        // Karena foreign key-nya adalah 'jabatan_id', BelongsTo sudah benar
        return $this->belongsTo(jabatan::class, 'jabatan_id');
    }

    /**
     * Relasi Dosen sebagai Dosen Pengampu Matakuliah
     */
    public function matakuliah(): HasMany
    {
        // Laravel akan mencari 'dosen_id' di tabel 'matakuliah'
        return $this->hasMany(Matakuliah::class, 'dosen_id'); // (Lebih aman sebutkan foreign key)
    }

    // --- TAMBAHAN RELASI KRS / PA ---

    /**
     * Relasi Dosen sebagai Dosen PA di tabel Mahasiswa.
     * Satu Dosen PA bisa membimbing BANYAK Mahasiswa.
     */
    public function mahasiswaBimbingan(): HasMany
    {
        // Menghubungkan ke 'dosen_pa_id' di tabel 'mahasiswas'
        return $this->hasMany(Mahasiswa::class, 'dosen_pa_id');
    }

    /**
     * Relasi Dosen sebagai Dosen PA di tabel KRS.
     * Satu Dosen PA menyetujui BANYAK entri KRS.
     */
    public function krsBimbingan(): HasMany
    {
        // Menghubungkan ke 'dosen_pa_id' di tabel 'krs'
        return $this->hasMany(Krs::class, 'dosen_pa_id');
    }
}
