<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index()
    {
        $nim = session('username'); // diasumsikan username = NIM
        $mahasiswa = DB::table('mahasiswa')->where('NIM', $nim)->first();

        return view('mahasiswa.profil', compact('mahasiswa'));
    }
}