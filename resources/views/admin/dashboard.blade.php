@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Dashboard Admin</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Mahasiswa</h5>
                    <p class="card-text display-6">{{ $jumlahMahasiswa }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Dosen</h5>
                    <p class="card-text display-6">{{ $jumlahDosen }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Sidang</h5>
                    <p class="card-text display-6">{{ $jumlahSidang }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
