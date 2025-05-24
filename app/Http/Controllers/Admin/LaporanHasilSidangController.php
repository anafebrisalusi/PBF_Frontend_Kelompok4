<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LaporanHasilSidangController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/hasil_sidang');

        $hasil = $response->successful() ? $response->json() : [];

        return view('admin.hasilsidang.index', compact('hasil'));
    }
}
