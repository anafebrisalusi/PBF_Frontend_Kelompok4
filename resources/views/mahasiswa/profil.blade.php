@extends('layouts.mahasiswa')

@section('content')
<style>
  .container {
    padding-top: 1rem;
    padding-bottom: 2rem;
  }
  h4 {
    font-weight: 700;
    color: #1e3a8a; /* biru navy */
    margin-bottom: 1.5rem;
  }
  table {
    background-color: #f9faff;
  }
  table th {
    background-color: #e0ebff;
    color: #1e3a8a;
    width: 180px;
    font-weight: 600;
  }
  table td {
    color: #333;
  }
  .text-muted {
    font-style: italic;
    margin-top: 1rem;
  }
</style>

<div class="container">
    <h4>Profil Mahasiswa</h4>

    @if($mahasiswa)
        <table class="table table-bordered mt-3 shadow-sm rounded">
            <tbody>
                <tr><th>NIM</th><td>{{ $mahasiswa->NIM }}</td></tr>
                <tr><th>Nama</th><td>{{ $mahasiswa->nama_mahasiswa }}</td></tr>
                <tr><th>Alamat</th><td>{{ $mahasiswa->alamat }}</td></tr>
                <tr><th>Kelas</th><td>{{ $mahasiswa->kelas }}</td></tr>
                <tr><th>Program Studi</th><td>{{ $mahasiswa->prodi }}</td></tr>
                <tr><th>Judul Tugas Akhir</th><td>{{ $mahasiswa->judul_tugasakhir }}</td></tr>
            </tbody>
        </table>
    @else
        <p class="text-muted">Data tidak ditemukan.</p>
    @endif
</div>
@endsection
