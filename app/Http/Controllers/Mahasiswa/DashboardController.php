<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifikasi;
use App\Models\HasilSidang;
use App\Models\ViewJadwalSidang; // Ganti dari Sidang ke View
use App\Models\HasilSidang as Hasil;

class DashboardController extends Controller
{
    public function index()
    {
        $nim = session('username');

        // Ambil notifikasi mahasiswa
        $notifikasi = Notifikasi::where('NIM', $nim)
                        ->orderBy('tanggal_kirim', 'desc')
                        ->get();

        // Ambil jadwal sidang dari view v_jadwalsidang
        $jadwal = ViewJadwalSidang::where('NIM', $nim)->first();

        // Ambil hasil sidang
        $hasil = Hasil::whereHas('sidang', function ($query) use ($nim) {
            $query->where('NIM', $nim);
        })->first();

        return view('mahasiswa.dashboard', compact('notifikasi', 'hasil', 'jadwal'));
    }
}
