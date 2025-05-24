<?php

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
