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

    .btn-soft-blue {
    background-color: #3b82f6;       /* biru sedang */
    color: white;
    border: none;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }

  .btn-soft-blue:hover {
    background-color: #2563eb;       /* biru lebih gelap saat hover */
    box-shadow: 0 0 8px rgba(37, 99, 235, 0.4);
  }
</style>

<div class="mb-3">
    <label class="form-label">NIM</label>
    <input type="text" name="NIM" value="{{ old('NIM', $mahasiswa['NIM'] ?? '') }}" class="form-control" required {{ isset($mahasiswa) ? 'readonly' : '' }}>
</div>

<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Alamat</label>
    <input type="text" name="alamat" value="{{ old('alamat', $mahasiswa->alamat ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Kelas</label>
    <input type="text" name="kelas" value="{{ old('kelas', $mahasiswa->kelas ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Prodi</label>
    <select name="prodi" class="form-control" required>
        <option value="">-- Pilih Prodi --</option>
        <option value="D3 Teknik Informatika" {{ (old('prodi', $mahasiswa->prodi ?? '') == 'D3 Teknik Informatika') ? 'selected' : '' }}>D3 Teknik Informatika</option>
        <option value="Sarjana Terapan Rekayasa Keamanan Siber" {{ (old('prodi', $mahasiswa->prodi ?? '') == 'Sarjana Terapan Rekayasa Keamanan Siber') ? 'selected' : '' }}>Sarjana Terapan Rekayasa Keamanan Siber</option>
        <option value="Sarjana Terapan Teknologi Rekayasa Multimedia" {{ (old('prodi', $mahasiswa->prodi ?? '') == 'Sarjana Terapan Teknologi Rekayasa Multimedia') ? 'selected' : '' }}>Sarjana Terapan Teknologi Rekayasa Multimedia</option>
        <option value="Sarjana Terapan Akuntansi Lembaga Keuangan Syariah" {{ (old('prodi', $mahasiswa->prodi ?? '') == 'Sarjana Terapan Akuntansi Lembaga Keuangan Syariah') ? 'selected' : '' }}>Sarjana Terapan Akuntansi Lembaga Keuangan Syariah</option>
        <option value="Sarjana Terapan Rekayasa Perangkat Lunak" {{ (old('prodi', $mahasiswa->prodi ?? '') == 'Sarjana Terapan Rekayasa Perangkat Lunak') ? 'selected' : '' }}>Sarjana Terapan Rekayasa Perangkat Lunak</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Judul Tugas Akhir</label>
    <input type="text" name="judul_tugasakhir" value="{{ old('judul_tugasakhir', $mahasiswa->judul_tugasakhir ?? '') }}" class="form-control" required>
</div>

