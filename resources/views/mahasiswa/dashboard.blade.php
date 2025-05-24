@extends('layouts.mahasiswa')

@section('content')
<style>
  /* Container dengan padding atas lebih kecil supaya konten naik */
  .custom-container {
    padding-top: 0.5rem !important; /* default biasanya 1.5rem di Bootstrap */
    padding-bottom: 2rem !important;
  }

  /* Header greeting dengan margin top negatif supaya rapat ke atas */
  .header-greeting {
    margin-top: -15px;
    margin-bottom: 1rem;
  }

  .header-greeting h4 {
    font-weight: 700;
    font-size: 1.5rem;
  }

  .header-greeting span.emoji {
    font-size: 1.3rem;
  }

  .header-greeting p {
    color: #6c757d; /* text-secondary */
    margin-bottom: 0;
    font-weight: 500;
  }
</style>

<div class="container custom-container">
    <div class="text-center header-greeting">
        <h4>Halo, {{ session('nama_mahasiswa') }} <span class="emoji">👋</span></h4>
        <p>NIM: <strong>{{ session('NIM') }}</strong></p>
    </div>

    <hr>

    <h5>📢 Notifikasi dari Dosen</h5>
    @if ($notifikasi->isEmpty())
        <p class="text-muted">Belum ada notifikasi.</p>
    @else
        <ul class="list-group">
            @foreach ($notifikasi as $notif)
                <li class="list-group-item">
                    <strong>{{ $notif->tanggal_kirim }}:</strong> {{ $notif->pesan }}
                </li>
            @endforeach
        </ul>
    @endif

    <hr>

    <h5>📅 Jadwal Sidang</h5>
    @if ($jadwal)
    <table class="table table-bordered w-100">
        <tr><th>Nama Dosen</th><td>{{ $jadwal->nama_dosen ?? '-' }}</td></tr>
        <tr><th>Waktu</th><td>{{ $jadwal->waktu_sidang }}</td></tr>
        <tr><th>Ruangan</th><td>{{ $jadwal->ruang_sidang }}</td></tr>
    </table>
    @else
        <p class="text-muted">Belum ada jadwal sidang.</p>
    @endif


    <hr class="my-4">

    <h5>📝 Hasil Sidang</h5>
    @if($hasil)
        <div class="card">
            <div class="card-body">
                <p><strong>Nilai:</strong> {{ $hasil->nilai }}</p>
                <p><strong>Catatan:</strong> {{ $hasil->catatan ?? '-' }}</p>
            </div>
        </div>
    @else
        <p class="text-muted">Belum ada hasil sidang yang tersedia.</p>
    @endif
</div>
@endsection
