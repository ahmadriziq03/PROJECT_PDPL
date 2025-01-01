@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4">Daftar Tugas</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Buat Tugas</a>
    <ul class="list-group">
        @foreach ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $task->title }}</strong>
                    <p>{{ $task->description }}</p>
                </div>
                <div class="d-flex align-items-center">
                    <!-- Tampilkan ikon jika tugas selesai -->
                    @if ($task->is_completed)
                        <i class="text-success bi bi-check-circle-fill me-3" title="Tugas selesai"></i>
                    @endif
                    
                    <!-- Tombol Edit -->
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i> <!-- Ikon Edit -->
                    </a>

                    <!-- Tombol Tandai Selesai -->
                    @if (!$task->is_completed)
                        <form action="{{ route('tasks.complete', $task) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="m-2 btn btn-success btn-sm">
                                <i class="fa-solid fa-check"></i> <!-- Ikon Centang -->
                            </button>
                        </form>
                    @endif

                    <!-- Tombol Hapus -->
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="m-2 btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash-can"></i> <!-- Ikon Hapus -->
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
