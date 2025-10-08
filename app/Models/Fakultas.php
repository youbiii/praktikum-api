<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    // Tambahkan properti table untuk memastikan Eloquent menunjuk ke tabel yang benar
    protected $table = 'fakultas';

    protected $fillable = ['nama_fakultas', 'kode_fakultas'];

    // Optional: Pastikan timestamps diaktifkan (defaultnya true)
    public $timestamps = true;

    public static function getAllFakultas()
    {
        // Tetap menggunakan self::all() untuk mengambil semua data
        return self::all();
    }
    
}
