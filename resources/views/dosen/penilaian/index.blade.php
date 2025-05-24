@extends('layouts.dosen')

@section('content')
<h4>Penilaian Sidang</h4>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mahasiswa</th>
            <th>Waktu</th>
            <th>Ruangan</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penilaian as $s)
        <tr>
            <td>{{ $s->sidang->mahasiswa->nama_mahasiswa ?? '-' }}</td>
            <td>{{ $s->sidang->waktu_sidang ?? '-' }}</td>
            <td>{{ $s->sidang->ruang_sidang ?? '-' }}</td>
            <td>{{ $s->nilai ?? '-' }}</td>
            <td>
                <a href="/dosen/penilaian/{{ $s->id_hasil }}/edit" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
