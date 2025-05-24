<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class NotifikasiAdminController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/notifikasi/';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $notifikasi = $response->successful() ? $response->json() : [];

        return view('admin.notifikasi.index', compact('notifikasi'));
    }
}
