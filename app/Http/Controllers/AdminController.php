<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Sidang;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahMahasiswa = Mahasiswa::count();
        $jumlahDosen = Dosen::count();
        $jumlahSidang = Sidang::count();

        return view('admin.dashboard', compact('jumlahMahasiswa', 'jumlahDosen', 'jumlahSidang'));
    }
}
