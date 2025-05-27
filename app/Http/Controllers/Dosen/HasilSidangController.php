<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HasilSidang;
use App\Models\Sidang;

class HasilSidangController extends Controller
{
    public function index()
    {
        $nidn = session('NIDN');

        $sidang = Sidang::where('NIDN', $nidn)
            ->with(['mahasiswa', 'hasil'])
            ->get();

        return view('dosen.penilaian.index', compact('sidang'));
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

        $hasil = HasilSidang::findOrFail($id_hasil);
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

        return redirect('/dosen/penilaian')->with('success', 'Nilai berhasil disimpan.');
    }
}
