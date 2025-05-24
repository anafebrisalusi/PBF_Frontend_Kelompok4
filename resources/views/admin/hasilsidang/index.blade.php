@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Laporan Hasil Sidang</h4>

    @if (empty($hasil))
        <div class="alert alert-warning">Belum ada data hasil sidang.</div>
    @else
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Dosen Penguji</th>
                <th>Nilai</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasil as $data)
                <tr>
                    <td>{{ $data['nama_mahasiswa'] ?? '-' }}</td>
                    <td>{{ $data['NIM'] ?? '-' }}</td>
                    <td>{{ $data['nama_dosen'] ?? '-' }}</td>
                    <td>{{ $data['nilai'] }}</td>
                    <td>{{ $data['catatan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
