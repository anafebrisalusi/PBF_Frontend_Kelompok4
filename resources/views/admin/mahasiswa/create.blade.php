@extends('layouts.admin')


@section('content')
<div class="container">
    <h3>Tambah Mahasiswa</h3>
    <form method="POST" action="/admin/mahasiswa">
        @csrf
        @include('admin.mahasiswa.form')
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection