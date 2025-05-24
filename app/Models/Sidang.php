<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sidang extends Model
{
    protected $table = 'sidang';
    protected $primaryKey = 'id_sidang';
    public $timestamps = false;

    protected $fillable = ['NIM', 'NIDN', 'waktu_sidang', 'ruang_sidang'];

    // ✅ Relasi ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NIM', 'NIM');
    }

    // ✅ Relasi ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'NIDN', 'NIDN');
    }

    public function hasil()
{
    return $this->hasOne(HasilSidang::class, 'id_sidang');
}

}
