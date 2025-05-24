

<div class="mb-3">
    <label>NIDN</label>
    <input type="text" name="NIDN" value="{{ old('NIDN', $dosen['NIDN'] ?? '') }}" class="form-control" required {{ isset($dosen) ? 'readonly' : '' }}>
</div>
<div class="mb-3">
    <label>Nama Dosen</label>
    <input type="text" name="nama_dosen" value="{{ old('nama_dosen', $dosen->nama_dosen ?? '') }}" class="form-control" required>
</div>
