@extends('layouts.dosen')

@section('content')
<h4>{{ isset($hasil) ? 'Edit Nilai' : 'Input Nilai' }}</h4>
<form method="POST" action="{{ isset($hasil) ? '/dosen/penilaian/'.$hasil->id_hasil : '/dosen/penilaian' }}">
    @csrf
    @if(isset($hasil))
        @method('PUT')
    @endif

    <input type="hidden" name="id_sidang" value="{{ $hasil->id_sidang ?? $id_sidang }}">

    <div class="mb-3">
        <label>Nilai</label>
        <input type="text" name="nilai" value="{{ old('nilai', $hasil->nilai ?? '') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Catatan</label>
        <textarea name="catatan" class="form-control">{{ old('catatan', $hasil->catatan ?? '') }}</textarea>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
