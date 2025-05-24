@extends('layouts.dosen')

@section('content')
<h4>Edit Notifikasi</h4>

<form method="POST" action="/dosen/notifikasi/{{ $notif->id_notifikasi }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>NIM Mahasiswa</label>
        <input type="text" name="NIM" class="form-control" value="{{ $notif->NIM }}" required>
    </div>

    <div class="mb-3">
        <label>Pesan</label>
        <textarea name="pesan" class="form-control" required>{{ $notif->pesan }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    <a href="/dosen/notifikasi" class="btn btn-secondary">Batal</a>
</form>
@endsection
