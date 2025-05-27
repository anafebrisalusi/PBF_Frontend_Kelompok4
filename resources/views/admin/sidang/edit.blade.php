@extends('layouts.admin')


@section('content')
<div class="container">
    <h3>Edit Jadwal Sidang</h3>
    <form method="POST" action="/admin/sidang/{{ $sidang-['id_sidang'] }}">
        @csrf
        @method('PUT')
        @include('admin.sidang.form')
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
