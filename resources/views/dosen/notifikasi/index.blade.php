@extends('layouts.dosen')

@section('content')
<div class="container">
    <h4>Daftar Notifikasi Terkirim</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="/dosen/notifikasi/create" class="btn btn-primary mb-3">Buat Notifikasi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mahasiswa</th>
                <th>Pesan</th>
                <th>Tanggal Kirim</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifikasi as $notif)
                <tr>
                    <td>{{ $notif->mahasiswa->nama_mahasiswa ?? 'NIM: '.$notif->NIM }}</td>
                    <td>{{ $notif->pesan }}</td>
                    <td>{{ $notif->tanggal_kirim }}</td>
                    <td>
                        <a href="/dosen/notifikasi/{{ $notif->id_notifikasi }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/dosen/notifikasi/{{ $notif->id_notifikasi }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus notifikasi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection