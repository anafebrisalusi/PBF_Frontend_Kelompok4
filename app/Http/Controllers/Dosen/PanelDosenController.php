<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sidang;

class PanelDosenController extends Controller
{
    public function dashboard()
    {
        // Jumlah seluruh sidang
        $jumlahSidang = Sidang::count();

        // Jumlah sidang yang berlangsung hari ini
        $jumlahSidangHariIni = Sidang::whereDate('waktu_sidang', now()->toDateString())->count();

        return view('dosen.dashboard', compact('jumlahSidang', 'jumlahSidangHariIni'));
    }
}