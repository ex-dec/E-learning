<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Task;
use App\Http\Requests\Teacher\TaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('teacher.task.index', compact('tasks'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('teacher.task.create', compact('grades'));
    }

    public function store(TaskRequest $request)
    {
        $validated = $request->validated();
        Task::create($validated);
        return redirect()->route('teacher.task.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Task $task)
    {
        $this->checkTask($task);
        $gradeSelected = Grade::find($task->grade_id);
        $grades = Grade::all();
        return view('teacher.task.edit', compact('task', 'grades', 'gradeSelected'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $validated = $request->validated();
        $this->checkTask($task);
        $task->update($validated);
        return redirect()->route('teacher.task.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Task $task)
    {
        $this->checkTask($task);
        $task->delete();
        return redirect()->route('teacher.task.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    private function checkTask(Task $task)
    {
        $task = Task::find($task)->first();
        if (!$task) {
            return redirect()->route('teacher.task.index')->with(['error' => 'Data tidak ditemukan!']);
        }
    }
}
