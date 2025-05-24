<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilSidang extends Model
{
    protected $table = 'hasil_sidang';
    protected $primaryKey = 'id_hasil';
    public $timestamps = false;

    protected $fillable = ['id_sidang', 'nilai', 'catatan'];

    public function sidang()
    {
        return $this->belongsTo(Sidang::class, 'id_sidang', 'id_sidang');
    }
}

