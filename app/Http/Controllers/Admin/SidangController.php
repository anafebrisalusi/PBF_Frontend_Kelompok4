<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SidangController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/sidang/';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $sidang = $response->successful() ? $response->json() : [];

        return view('admin.sidang.index', compact('sidang'));
    }

    public function create()
    {
        $mahasiswa = Http::get('http://localhost:8080/mahasiswa/')->json();
        $dosen = Http::get('http://localhost:8080/dosen/')->json();

        return view('admin.sidang.create', compact('mahasiswa', 'dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required',
            'NIDN' => 'required',
            'waktu_sidang' => 'required',
            'ruang_sidang' => 'required',
        ]);

        $response = Http::post($this->apiUrl, $request->all());

        if ($response->successful()) {
            return redirect('/admin/sidang')->with('success', 'Jadwal sidang berhasil ditambahkan.');
        }

        return back()->with('error', 'Gagal menambahkan jadwal sidang.');
    }

    public function edit($id)
    {
        $sidang = Http::get($this->apiUrl . $id)->json();
        $mahasiswa = Http::get('http://localhost:8080/mahasiswa/')->json();
        $dosen = Http::get('http://localhost:8080/dosen/')->json();

        return view('admin.sidang.edit', compact('sidang', 'mahasiswa', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NIM' => 'required',
            'NIDN' => 'required',
            'waktu_sidang' => 'required',
            'ruang_sidang' => 'required',
        ]);

        $response = Http::put($this->apiUrl . $id, $request->all());

        if ($response->successful()) {
            return redirect('/admin/sidang')->with('success', 'Jadwal sidang berhasil diperbarui.');
        }

        return back()->with('error', 'Gagal memperbarui jadwal sidang.');
    }

    public function destroy($id)
    {
        $response = Http::delete($this->apiUrl . $id);

        if ($response->successful()) {
            return back()->with('success', 'Jadwal sidang berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus jadwal sidang.');
    }
}
