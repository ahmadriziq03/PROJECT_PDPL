<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    private $taskService;

    public function __construct()
    {
        $this->taskService = TaskService::getInstance();
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $this->taskService->createTask($request->only('title', 'description'));

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dibuat!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $this->taskService->updateTask($task, $request->only('title', 'description'));

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy(Task $task)
    {
        $this->taskService->deleteTask($task);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!');
    }

    public function complete(Task $task)
    {
        $this->taskService->markTaskAsComplete($task);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditandai selesai!');
    }
}
