<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'NIM',
        'Nama_Mahasiswa',
        'Email',
        'prodi_id',        // Foreign Key ke tabel prodis
        'dosen_pa_id',     // Foreign Key ke tabel dosens (Dosen PA)
        'No_HP',
        'Alamat',
        'Jenis_Kelamin',
    ];

    public function prodi(): BelongsTo
    {
        // Secara default mencari foreign key 'prodi_id'
        return $this->belongsTo(Prodi::class);
    }

    public function dosenPa(): BelongsTo
    {
        // Kita perlu secara eksplisit menyebutkan foreign key-nya
        return $this->belongsTo(Dosen::class, 'dosen_pa_id');
    }

    // --- TAMBAHAN RELASI KRS ---

    /**
     * Relasi ke entri KRS (tabel pivot).
     * Satu Mahasiswa memiliki BANYAK entri KRS.
     */
    public function krs(): HasMany
    {
        return $this->hasMany(Krs::class);
    }

    /**
     * Relasi Many-to-Many ke Matakuliah.
     * Satu Mahasiswa bisa mengambil BANYAK Matakuliah (melalui tabel KRS).
     */
    public function matakuliahDiambil(): BelongsToMany
    {
        return $this->belongsToMany(
            Matakuliah::class, // Model tujuan
            'krs',             // Nama tabel pivot (tengah)
            'mahasiswa_id',    // Foreign key di pivot untuk model ini
            'matakuliah_id'    // Foreign key di pivot untuk model tujuan
        )
        // Kita tambahkan withPivot agar bisa ambil data ekstra dari tabel krs
        ->withPivot('tahun_akademik', 'semester_diambil', 'status', 'nilai', 'dosen_pa_id')
        ->withTimestamps();
    }
}
