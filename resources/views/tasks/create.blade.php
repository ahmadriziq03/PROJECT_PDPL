@extends('layouts.app')

@section('content')
<div class="container mt-5">
<h1 class="text-center mb-4">Buat Tugas Baru</h1>
<form action="{{ route('tasks.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    <div class="mb-3">
            <label for="title" class="form-label">Judul:</label>
            <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
            <label for="description" class="form-label">Deskripsi:</label>
            <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="text-center" >
    <button type="submit" class="btn btn-primary mb-3">Simpan</button>
    </div>
</form>
</div>
@endsection