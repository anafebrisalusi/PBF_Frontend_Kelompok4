@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Daftar Notifikasi Terkirim</h4>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Mahasiswa</th>
                <th>Pesan</th>
                <th>Tanggal Kirim</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notifikasi as $notif)
                <tr>
                    <td>{{ $notif['NIM'] ?? '-' }}</td>
                    <td>{{ $notif['pesan'] ?? '-' }}</td>
                    <td>{{ $notif['tanggal_kirim'] ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Tidak ada notifikasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
