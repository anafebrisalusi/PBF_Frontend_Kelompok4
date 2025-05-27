<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sidang;
use Carbon\Carbon;

class PanelDosenController extends Controller
{
    public function dashboard()
    {
        $nidn = session('NIDN'); // Mengambil NIDN dari session dosen yang login

        // Jumlah sidang yang dipegang dosen tersebut
        $jumlahSidang = Sidang::where('NIDN', $nidn)->count();

        // Jumlah sidang hari ini yang dipegang dosen tersebut
        $jumlahSidangHariIni = Sidang::where('NIDN', $nidn)
            ->whereDate('waktu_sidang', Carbon::today())
            ->count();

        return view('dosen.dashboard', compact('jumlahSidang', 'jumlahSidangHariIni'));
    }
}
