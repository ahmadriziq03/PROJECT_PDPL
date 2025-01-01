@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Tugas</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul:</label>
            <input type="text" id="title" name="title" value="{{ $task->title }}" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi:</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ $task->description }}</textarea>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
