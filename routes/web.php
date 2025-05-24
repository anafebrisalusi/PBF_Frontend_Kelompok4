<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\SidangController;
use App\Http\Controllers\Dosen\HasilSidangController;
use App\Http\Controllers\Dosen\PanelDosenController;
use App\Http\Controllers\Dosen\NotifikasiController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\ProfilController;
use App\Http\Controllers\Admin\NotifikasiAdminController;
use App\Http\Controllers\Admin\LaporanHasilSidangController;
use App\Http\Controllers\Dosen\MahasiswaSidangController;






// Login & Register
Route::get('/', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

// =========================
// Role Admin
// =========================
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

    // Dosen CRUD
    Route::get('/admin/dosen', [DosenController::class, 'index']);
    Route::get('/admin/dosen/create', [DosenController::class, 'create']);
    Route::post('/admin/dosen', [DosenController::class, 'store']);
    Route::get('/admin/dosen/{nidn}/edit', [DosenController::class, 'edit']);
    Route::put('/admin/dosen/{nidn}', [DosenController::class, 'update']);
    Route::delete('/admin/dosen/{nidn}', [DosenController::class, 'destroy']);

    // Sidang CRUD
    Route::get('/admin/sidang', [SidangController::class, 'index']);
    Route::get('/admin/sidang/create', [SidangController::class, 'create']);
    Route::post('/admin/sidang', [SidangController::class, 'store']);
    Route::get('/admin/sidang/{id}/edit', [SidangController::class, 'edit']);
    Route::put('/admin/sidang/{id}', [SidangController::class, 'update']);
    Route::delete('/admin/sidang/{id}', [SidangController::class, 'destroy']);

    // Notifikasi
     Route::get('/admin/notifikasi', [NotifikasiAdminController::class, 'index']);

    // Hasil Sidang
    Route::get('/admin/hasil-sidang', [LaporanHasilSidangController::class, 'index']);

});

// =========================
// Role Mahasiswa
// =========================
Route::middleware(['role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', [MahasiswaDashboardController::class, 'index']);
    Route::get('/mahasiswa/profil', [ProfilController::class, 'index']);
});

// =========================
// Role Dosen
// =========================
Route::middleware(['role:dosen'])->group(function () {
    // Dashboard Dosen ✅
    Route::get('/dosen/dashboard', [PanelDosenController::class, 'dashboard']);

    // Hasil Sidang (Penilaian)
    Route::get('/dosen/penilaian', [HasilSidangController::class, 'index']);
    Route::get('/dosen/penilaian/create/{id_sidang}', [HasilSidangController::class, 'create']);
    Route::post('/dosen/penilaian', [HasilSidangController::class, 'store']);
    Route::get('/dosen/penilaian/{id_hasil}/edit', [HasilSidangController::class, 'edit']);
    Route::put('/dosen/penilaian/{id_hasil}', [HasilSidangController::class, 'update']);

    Route::get('/dosen/notifikasi', [NotifikasiController::class, 'index']);
    Route::get('/dosen/notifikasi/create', [NotifikasiController::class, 'create']);
    Route::post('/dosen/notifikasi', [NotifikasiController::class, 'store']);
    Route::get('/dosen/notifikasi/{id}/edit', [NotifikasiController::class, 'edit']);
    Route::put('/dosen/notifikasi/{id}', [NotifikasiController::class, 'update']);
    Route::delete('/dosen/notifikasi/{id}', [NotifikasiController::class, 'destroy']);

    Route::get('/dosen/mahasiswa-sidang', [MahasiswaSidangController::class, 'index']);

    
});
