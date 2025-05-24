@extends('layouts.dosen')

@section('content')
<div class="container">
    <h4>Daftar Mahasiswa Sidang</h4>

    @if ($mahasiswa->isEmpty())
        <div class="alert alert-warning">Belum ada mahasiswa yang dijadwalkan sidang.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Judul Tugas Akhir</th>
                    <th>Waktu Sidang</th>
                    <th>Ruangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs->mahasiswa->nama_mahasiswa ?? '-' }}</td>
                    <td>{{ $mhs->mahasiswa->NIM ?? '-' }}</td>
                    <td>{{ $mhs->mahasiswa->judul_tugasakhir ?? '-' }}</td>
                    <td>{{ $mhs->waktu_sidang }}</td>
                    <td>{{ $mhs->ruang_sidang }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
