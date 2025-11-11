<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $fillable = ['nama_prodi', 'kode_prodi', 'fakultas_id'];
    public $timestamps = true;
    public static function getAllProdi()
    {
        return self::all();
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class);
    }
}
