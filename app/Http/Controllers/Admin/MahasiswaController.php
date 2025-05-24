<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/mahasiswa';

    public function index()
    {
        $response = Http::get($this->apiUrl);

        if ($response->failed()) {
            return back()->with('error', 'Gagal mengambil data dari API.');
        }

        $mahasiswa = $response->json();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required',
            'nama_mahasiswa' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
            'prodi' => 'required',
            'judul_tugasakhir' => 'required',
        ]);

        $response = Http::post($this->apiUrl, $request->all());

        if ($response->failed()) {
            return back()->with('error', 'Gagal menambahkan data ke API.');
        }

        return redirect('/admin/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit($nim)
    {
        $response = Http::get("{$this->apiUrl}/$nim");

        if ($response->failed() || !$response->json()) {
            return back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $mahasiswa = $response->json();
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        $response = Http::put("{$this->apiUrl}/$nim", $request->all());

        if ($response->failed()) {
            return back()->with('error', 'Gagal memperbarui data.');
        }

        return redirect('/admin/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($nim)
    {
        $response = Http::delete("{$this->apiUrl}/$nim");

        if ($response->failed()) {
            return back()->with('error', 'Gagal menghapus data.');
        }

        return back()->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
