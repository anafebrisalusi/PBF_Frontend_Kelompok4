@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Jadwal Sidang</h3>
    <a href="/admin/sidang/create" class="btn btn-primary mb-3">Tambah Jadwal</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Waktu</th>
                <th>Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sidang as $s)
            <tr>
                <td>{{ $s['NIM'] }}</td>
                <td>{{ $s['nama_mahasiswa'] ?? '-' }}</td>
                <td>{{ $s['NIDN'] }}</td>
                <td>{{ $s['nama_dosen'] ?? '-' }}</td>
                <td>{{ $s['waktu_sidang'] }}</td>
                <td>{{ $s['ruang_sidang'] }}</td>
                <td>
                    <a href="/admin/sidang/{{ $s['id_sidang'] }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <button onclick="hapusSidang('{{ $s['id_sidang'] }}')" class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data sidang.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function hapusSidang(id) {
        if (confirm('Yakin ingin menghapus data sidang ini?')) {
            fetch(`http://localhost:8080/sidang/${id}`, {
                method: 'DELETE'
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message || 'Data sidang berhasil dihapus.');
                location.reload();
            })
            .catch(error => {
                console.error('Gagal menghapus:', error);
                alert('Gagal menghapus data sidang.');
            });
        }
    }
</script>
@endsection
