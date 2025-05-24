<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilSidang;

class HasilSidangController extends Controller
{
    public function index()
    {
        // Ambil data hasil sidang dengan relasi ke sidang dan mahasiswa
        $penilaian = HasilSidang::with('sidang.mahasiswa')->get();

        return view('dosen.penilaian.index', compact('penilaian'));
    }

    public function edit($id_hasil)
    {
        $hasil = HasilSidang::with('sidang.mahasiswa')->findOrFail($id_hasil);
        return view('dosen.penilaian.edit', compact('hasil'));
    }

    public function update(Request $request, $id_hasil)
    {
        $request->validate([
            'nilai' => 'required|numeric|min:0|max:100',
            'catatan' => 'nullable|string|max:255',
        ]);

        $hasil = \App\Models\HasilSidang::findOrFail($id_hasil);
        $hasil->update([
            'nilai' => $request->nilai,
            'catatan' => $request->catatan,
        ]);

        return redirect('/dosen/penilaian')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function create($id_sidang)
{
    return view('dosen.penilaian.create', compact('id_sidang'));
}

public function store(Request $request)
{
    $request->validate([
        'id_sidang' => 'required|exists:sidang,id_sidang',
        'nilai' => 'required|numeric|min:0|max:100',
        'catatan' => 'nullable|string|max:255',
    ]);

    HasilSidang::create([
        'id_sidang' => $request->id_sidang,
        'nilai' => $request->nilai,
        'catatan' => $request->catatan,
    ]);

    return redirect('/dosen/penilaian')->with('success', 'Nilai berhasil disimpan.');
}
}