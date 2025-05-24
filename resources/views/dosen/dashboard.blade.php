@extends('layouts.dosen')

@section('content')
<h4>Halo, {{ session('nama_dosen') }} 👋</h4>
<p class="text-muted">NIDN: {{ session('NIDN') }}</p>

<h3 class="mt-4">Dashboard Dosen</h3>

<div class="row">
    <div class="col-md-6">
        <div class="card text-bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Sidang Anda</h5>
                <p class="card-text display-6">{{ $jumlahSidang }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Sidang Hari Ini</h5>
                <p class="card-text display-6">{{ $jumlahSidangHariIni }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
