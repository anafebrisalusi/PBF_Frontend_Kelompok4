@extends('layouts.dosen')

@section('content')
<div class="container">
    <h4>Kirim Notifikasi ke Mahasiswa</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/dosen/notifikasi">
        @csrf
        <div class="mb-3">
            <label for="NIM">Pilih Mahasiswa</label>
            <select name="NIM" class="form-control" required>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($mahasiswa as $mhs)
                    <option value="{{ $mhs->NIM }}">{{ $mhs->NIM }} - {{ $mhs->nama_mahasiswa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pesan">Pesan</label>
            <textarea name="pesan" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim Notifikasi</button>
        <a href="/dosen/notifikasi" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection