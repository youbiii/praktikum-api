<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatans';
    protected $fillable = ['nama_jabatan', 'kode_jabatan'];
    public $timestamps = true;
    public static function getAlljabatan()
    {
        return self::all();
    }
        public function dosens()
    {
        return $this->hasMany(Dosen::class, 'jabatan_id');
    }
}
