@extends('layouts.dosen')

@section('content')
<div class="container">
    <h4>{{ isset($hasil) ? '✏️ Edit Nilai Sidang' : '📝 Input Nilai Sidang' }}</h4>

    {{-- Error Handling --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ isset($hasil) ? '/dosen/penilaian/'.$hasil->id_hasil : '/dosen/penilaian' }}">
        @csrf
        @if(isset($hasil))
            @method('PUT')
        @endif

        <input type="hidden" name="id_sidang" value="{{ $hasil->id_sidang ?? $id_sidang }}">

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai (0–100)</label>
            <input type="number" name="nilai" class="form-control" min="0" max="100"
                value="{{ old('nilai', $hasil->nilai ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control" rows="3">{{ old('catatan', $hasil->catatan ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">💾 Simpan</button>
        <a href="/dosen/penilaian" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
