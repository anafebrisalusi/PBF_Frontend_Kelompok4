@extends('layouts.admin')


@section('content')
<div class="container">
    <h3>Tambah Jadwal Sidang</h3>
    <form method="POST" action="/admin/sidang">
        @csrf
        @include('admin.sidang.form')
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
