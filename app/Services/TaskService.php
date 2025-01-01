<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    private static $instance;

    private function __construct() {} // biar ga instansiasi langsung
    private function __clone() {} // nyegah cloning

    public static function getInstance(): TaskService
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getAllTasks()
    {
        return Task::all();
    }

    public function createTask($data)
    {
        return Task::create($data);
    }

    public function updateTask(Task $task, $data)
    {
        return $task->update($data);
    }

    public function deleteTask(Task $task)
    {
        return $task->delete();
    }

    public function markTaskAsComplete(Task $task)
    {
        return $task->update(['is_completed' => true]);
    }
}
