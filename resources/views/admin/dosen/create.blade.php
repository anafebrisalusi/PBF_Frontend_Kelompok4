@extends('layouts.admin')


@section('content')
<div class="container">
    <h3>Tambah Dosen</h3>
    <form method="POST" action="/admin/dosen">
        @csrf
        @include('admin.dosen.form')
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
