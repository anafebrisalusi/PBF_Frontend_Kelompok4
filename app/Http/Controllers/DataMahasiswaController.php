<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataMahasiswaController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/mahasiswa';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $mahasiswa = $response->json();

        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $response = Http::post($this->apiUrl, $request->all());

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        }

        return redirect()->back()->with('error', 'Gagal menambahkan data');
    }

    public function update(Request $request, $NIM)
    {
        $response = Http::put("{$this->apiUrl}/{$NIM}", $request->all());

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Data berhasil diubah');
        }

        return redirect()->back()->with('error', 'Gagal mengubah data');
    }

    public function destroy($NIM)
    {
        $response = Http::delete("{$this->apiUrl}/{$NIM}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data');
    }
}
