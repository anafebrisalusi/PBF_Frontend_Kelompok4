@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4 text-primary">✏️ Edit Mahasiswa</h3>

    <form method="POST" action="/admin/mahasiswa/{{ $mahasiswa['NIM'] }}">
        @csrf
        @method('PUT')

        <div class="card p-4 shadow-sm" style="background-color: #f8fbff; border: 1px solid #d0e5fa;">
            @include('admin.mahasiswa.form')
            <button class="btn text-white mt-3" style="background-color: #3b82f6;">Update</button>
        </div>
    </form>
</div>
@endsection
