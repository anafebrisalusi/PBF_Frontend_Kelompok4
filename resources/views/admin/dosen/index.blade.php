@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Daftar Dosen</h3>
    <a href="/admin/dosen/create" class="btn btn-primary mb-3">Tambah Dosen</a>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Alert error --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dosen as $d)
                <tr>
                    <td>{{ $d['NIDN'] }}</td>
                    <td>{{ $d['nama_dosen'] }}</td>
                    <td>
                        <a href="/admin/dosen/{{ $d['NIDN'] }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/admin/dosen/{{ $d['NIDN'] }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada data dosen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
