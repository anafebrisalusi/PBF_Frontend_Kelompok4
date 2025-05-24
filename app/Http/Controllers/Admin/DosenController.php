<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DosenController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/dosen';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $dosen = $response->successful() ? $response->json() : [];

        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIDN' => 'required',
            'nama_dosen' => 'required',
        ]);

        $response = Http::post($this->apiUrl, $request->all());

        if ($response->successful()) {
            return redirect('/admin/dosen')->with('success', 'Dosen berhasil ditambahkan (via API).');
        }

        return back()->with('error', 'Gagal menambahkan data dosen.');
    }

    public function edit($nidn)
    {
        $response = Http::get("{$this->apiUrl}/$nidn");

        if (!$response->successful()) {
            return back()->with('error', 'Data dosen tidak ditemukan.');
        }

        $dosen = $response->json();
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $nidn)
    {
        $response = Http::put("{$this->apiUrl}/$nidn", $request->all());

        if ($response->successful()) {
            return redirect('/admin/dosen')->with('success', 'Data dosen berhasil diperbarui (via API).');
        }

        return back()->with('error', 'Gagal memperbarui data dosen.');
    }

    public function destroy($nidn)
    {
        $response = Http::delete("{$this->apiUrl}/$nidn");

        if ($response->successful()) {
            return back()->with('success', 'Data dosen berhasil dihapus (via API).');
        }

        return back()->with('error', 'Gagal menghapus data dosen.');
    }
}