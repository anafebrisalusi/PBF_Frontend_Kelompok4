@extends('layouts.dosen')

@section('content')
<h4>Penilaian Sidang</h4>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nama Mahasiswa</th>
            <th>Waktu Sidang</th>
            <th>Ruangan</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($sidang as $s)
        <tr>
            <td>{{ $s->mahasiswa->nama_mahasiswa ?? '-' }}</td>
            <td>{{ $s->waktu_sidang ?? '-' }}</td>
            <td>{{ $s->ruang_sidang ?? '-' }}</td>
            <td>{{ $s->hasil->nilai ?? '-' }}</td>
            <td>
                @if($s->hasil)
                    <a href="/dosen/penilaian/{{ $s->hasil->id_hasil }}/edit" class="btn btn-sm btn-warning">Edit</a>
                @else
                    <a href="/dosen/penilaian/create/{{ $s->id_sidang }}" class="btn btn-sm btn-primary">Nilai</a>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">Belum ada mahasiswa yang disidangkan.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
