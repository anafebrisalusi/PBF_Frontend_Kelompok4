<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewJadwalSidang extends Model
{
    protected $table = 'v_jadwalsidang';
    protected $primaryKey = 'id_sidang';
    public $incrementing = false;
    public $timestamps = false;

    // Tidak perlu relasi karena ini dari view, semua sudah digabung
}
