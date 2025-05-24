<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Notifikasi;
use App\Models\Sidang;


class NotifikasiController extends Controller
{
    public function index()
    {
        $nidn = session('NIDN');

        $notifikasi = Notifikasi::where('NIDN', $nidn)->get();

        $penilaian = Sidang::with('mahasiswa', 'hasil')
            ->where('NIDN', $nidn)
            ->get();

        return view('dosen.notifikasi.index', compact('notifikasi', 'penilaian'));
    }


    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('dosen.notifikasi.create', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $notif = Notifikasi::findOrFail($id);
        return view('dosen.notifikasi.edit', compact('notif'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NIM' => 'required',
            'pesan' => 'required',
        ]);

        Notifikasi::where('id_notifikasi', $id)->update([
            'NIM' => $request->NIM,
            'pesan' => $request->pesan,
            'tanggal_kirim' => now(),
        ]);

        return redirect('/dosen/notifikasi')->with('success', 'Notifikasi berhasil diperbarui.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required',
            'pesan' => 'required',
        ]);

        Notifikasi::create([
            'NIM' => $request->NIM,
            'pesan' => $request->pesan,
            'tanggal_kirim' => now(),
            'NIDN' => session('NIDN'), // sudah benar, asal kolom NIDN ada di tabel
        ]);

        return redirect('/dosen/notifikasi')->with('success', 'Notifikasi berhasil dikirim.');
    }


    public function destroy($id)
    {
        // Hapus notifikasi berdasarkan ID
        \App\Models\Notifikasi::destroy($id);

        return redirect('/dosen/notifikasi')->with('success', 'Notifikasi berhasil dihapus.');
    }
}
