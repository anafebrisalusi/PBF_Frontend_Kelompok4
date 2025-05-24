<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user'; // Pastikan nama tabel sesuai dengan nama di database

    protected $fillable = [
        'username',
        'password',
        'status', // Menyimpan role, seperti 'admin', 'mahasiswa', 'dosen'
    ];

    protected $hidden = [
        'password', // Menyembunyikan password agar tidak terlihat langsung
    ];

    // Mutator untuk otomatis mengenkripsi password sebelum disimpan
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Method untuk mengecek apakah user memiliki role tertentu
    public function hasRole($role)
    {
        return $this->status === $role;
    }
}
