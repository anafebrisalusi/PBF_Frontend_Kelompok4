<?php

// app/Http/Controllers/Dosen/MahasiswaSidangController.php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Sidang;
use Illuminate\Http\Request;

class MahasiswaSidangController extends Controller
{
    public function index()
    {
        $nidn = session('NIDN'); // atau bisa juga ambil dari session lainnya jika tidak pakai NIDN
        $mahasiswa = Sidang::with('mahasiswa')
            ->where('NIDN', $nidn)
            ->orderBy('waktu_sidang', 'asc')
            ->get();

        return view('dosen.mahasiswa_sidang.index', compact('mahasiswa'));
    }
}
