@extends('layouts.admin')


@section('content')
<div class="container">
    <h3>Edit Dosen</h3>
    <form method="POST" action="/admin/dosen/{{ $dosen['NIDN'] }}">
        @csrf
        @method('PUT')
        @include('admin.dosen.form')
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
