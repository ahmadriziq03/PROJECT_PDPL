<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);

// Route untuk menandai tugas selesai
Route::patch('tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');


?>