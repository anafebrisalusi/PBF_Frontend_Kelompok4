# 🎓 Sistem Informasi Sidang Tugas Akhir

Aplikasi berbasis **Laravel 10** untuk mengelola data sidang tugas akhir mahasiswa, seperti data mahasiswa, dosen, jadwal sidang, penilaian, dan notifikasi. Aplikasi ini menggunakan **API backend** dari **CodeIgniter 4**, sehingga semua proses (Create, Read, Update, Delete) dilakukan melalui API.

---

## 📦 Tutorial Instalasi Laravel

###  1. Download Laravel

Buka terminal dan jalankan:

```bash
composer create-project laravel/laravel PBF_Frontend_Kelompok4
cd PBF_Frontend_Kelompok4

```
### 2. Ganti File .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_sidangakhir
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Jalankan Laravel
```bash
php artisan serve
```

### 4. Akses di Browser
```bash
http://localhost:8000/
```

### 5. Fitur Utama
#### a. Role Admin
Kelola mahasiswa, dosen, jadwal sidang, hasil sidang, dan melihat notifikasi
#### b. Role Dosen
Lihat mahasiswa yang di sidang, beri nilai, kirim notifikasi ke mahasiswa
#### c. Role Mahasiswa
Lihat jadwal, nilai, dan notifikasi dari dosen

### 6. Github Clone Backend 
```bash
https://github.com/shelalaa20/PBF_KEL4_backend.git
```

### 7. Download Postman
```bash
https://www.postman.com/downloads/
```
### 8. Import Postman Backend
```
https://drive.google.com/drive/folders/1oM_-M4-XOv8jatZQ66pT2e_izZ_DCZaM?usp=sharing
```
### 9. Buat Controller
Saya membuat controller yang berbeda untuk masing-masing role. Karena setiap role punya fungsinya masing-masing, maka logikanya dipisahkan agar tidak tumpang tindih.

## Proses Pembuatan
### 1. Login dengan AuthController
```<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('user')
            ->where('username', $request->username)
            ->where('password', $request->password) // Disarankan nanti pakai Hash
            ->first();

        if ($user) {
            // Simpan data ke session
            session([
                'id_user' => $user->id_user,
                'username' => $user->username,
                'role' => $user->role,
            ]);

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            if ($user->role === 'mahasiswa') {
            // Cari data mahasiswa berdasarkan NIM = username
            $mahasiswa = DB::table('mahasiswa')->where('NIM', $user->username)->first();

            if ($mahasiswa) {
                session([
                    'NIM' => $mahasiswa->NIM,
                    'nama_mahasiswa' => $mahasiswa->nama_mahasiswa,
                ]);
            }

    return redirect('/mahasiswa/dashboard');
}

            if ($user->role === 'dosen') {
            $dosen = DB::table('dosen')->where('NIDN', $user->username)->first();

            if ($dosen) {
                session([
                    'NIDN' => $dosen->NIDN,
                    'nama_dosen' => $dosen->nama_dosen,
                ]);
            }

    return redirect('/dosen/dashboard');
}
        }

        return back()->with('error', 'Username atau Password salah!');
    }

    // Proses logout
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    // Tampilkan halaman register
    public function showRegister()
    {
        return view('register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:4',
            'role' => 'required',
        ]);

        // Simpan user tanpa NIDN
        DB::table('user')->insert([
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect('/')->with('success', 'Akun berhasil dibuat. Silakan login!');
    }
}
```
### 2. Buat Controller
```
php artisan make:controller Admin/MahasiswaController
```
### 3. Fetch Data dari Api
```
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
```
### 4. Tampilkan di Blade
```
@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Daftar Mahasiswa</h3>
    <a href="/admin/mahasiswa/create" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pesan error --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>Prodi</th>
                <th>Judul TA</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs['NIM'] }}</td>
                <td>{{ $mhs['nama_mahasiswa'] }}</td>
                <td>{{ $mhs['alamat'] }}</td>
                <td>{{ $mhs['kelas'] }}</td>
                <td>{{ $mhs['prodi'] }}</td>
                <td>{{ $mhs['judul_tugasakhir'] }}</td>
                <td>
                    <a href="/admin/mahasiswa/{{ $mhs['NIM'] }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/admin/mahasiswa/{{ $mhs['NIM'] }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">Data mahasiswa tidak tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
```
### 5. Layouts
```
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mahasiswa Panel - Sistem Sidang</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      overflow-x: hidden;
      background-color: #e9f0ff; /* Background biru muda */
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
    }

    .sidebar {
      height: 100vh;
      background-color: rgb(27, 47, 112); /* Biru gelap */
      color: white;
      display: flex;
      flex-direction: column;
      padding-top: 1rem;
      position: sticky;
      top: 0;
      box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }

    .sidebar h5 {
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #bfdbfe; /* Biru terang */
      user-select: none;
      text-align: center;
    }

    .sidebar a {
      color: #dbeafe; /* Biru sangat terang */
      display: block;
      padding: 12px 24px;
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.3s ease, color 0.3s ease;
      border-radius: 0 25px 25px 0;
      margin: 0 0.5rem 0.5rem 0;
      user-select: none;
    }

    .sidebar a:hover, .sidebar a.active {
      background-color: #3b82f6; /* Biru sedang */
      color: white;
      text-decoration: none;
      box-shadow: 0 0 8px #3b82f6;
    }

    .sidebar a.text-danger {
      margin-top: auto;
      font-weight: 600;
      border-radius: 0 25px 25px 0;
    }

    .sidebar a.text-danger:hover {
      background-color: #dc2626; /* merah */
      color: white;
      box-shadow: 0 0 8px #dc2626;
    }

    .content-area {
      background-color: white;
      padding: 2rem;
      max-height: 100vh;
      overflow-y: auto;
      box-shadow: inset 0 0 10px rgb(0 0 0 / 0.1);
    }

    .table thead th {
    background-color: #b0d4f1;
    color: #1b2f70;

    text-align: center;
    }
  </style>
</head>
<body>
  <div class="row g-0">
    <nav class="col-md-2 sidebar">
      <h5><i class="bi bi-person-circle me-2"></i>Mahasiswa</h5>
      <a href="/mahasiswa/dashboard"><i class="bi bi-house-door me-2"></i> Dashboard</a>
      <a href="/mahasiswa/profil"><i class="bi bi-person-lines-fill me-2"></i> Profil</a>
      <a href="/logout" class="text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
    </nav>

    <main class="col-md-10 content-area">
      @yield('content')
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

### 6. Routes
```
Route::middleware(['role:admin'])->group(function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

    // Mahasiswa CRUD
    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/admin/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::post('/admin/mahasiswa', [MahasiswaController::class, 'store']);
    Route::get('/admin/mahasiswa/{nim}/edit', [MahasiswaController::class, 'edit']);
    Route::put('/admin/mahasiswa/{nim}', [MahasiswaController::class, 'update']);
    Route::delete('/admin/mahasiswa/{nim}', [MahasiswaController::class, 'destroy']);

```
### 7. Running Frontend dan Backend
```
frontend : php artisan serve
backend : php spark serve
```



