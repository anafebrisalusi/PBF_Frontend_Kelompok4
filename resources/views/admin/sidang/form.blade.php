<style>
    .form-label {
        font-weight: 600;
        color: #1e3a8a; /* Biru navy */
    }
    .form-control {
        background-color: #f0f6ff; /* Biru muda soft */
        border: 1px solid #c7ddef;
        color: #1e3a8a;
    }
    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 0.15rem rgba(59, 130, 246, 0.25);
    }
    select.form-control {
        background-color: #f0f6ff;
    }
</style>

<div class="mb-3">
    <label class="form-label">Mahasiswa</label>
    <select name="NIM" class="form-control" required>
        <option value="">-- Pilih Mahasiswa --</option>
        @foreach($mahasiswa as $m)
            <option value="{{ $m['NIM'] }}" {{ (old('NIM', $sidang['NIM'] ?? '') == $m['NIM']) ? 'selected' : '' }}>
                {{ $m['NIM'] }} - {{ $m['nama_mahasiswa'] }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Dosen Penguji</label>
    <select name="NIDN" class="form-control" required>
        <option value="">-- Pilih Dosen --</option>
        @foreach($dosen as $d)
            <option value="{{ $d['NIDN'] }}" {{ (old('NIDN', $sidang['NIDN'] ?? '') == $d['NIDN']) ? 'selected' : '' }}>
                {{ $d['NIDN'] }} - {{ $d['nama_dosen'] }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Waktu Sidang</label>
    <input type="datetime-local" name="waktu_sidang" value="{{ old('waktu_sidang', $sidang['waktu_sidang'] ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Ruangan</label>
    <input type="text" name="ruang_sidang" value="{{ old('ruang_sidang', $sidang['ruang_sidang'] ?? '') }}" class="form-control" required>
</div>
