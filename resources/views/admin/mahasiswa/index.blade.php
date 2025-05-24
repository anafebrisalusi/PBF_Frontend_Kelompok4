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
