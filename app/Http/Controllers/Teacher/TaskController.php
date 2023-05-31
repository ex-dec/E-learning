<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Grade;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('teacher.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();
        return view('teacher.task.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Task::create([
            'task_url' => $request->task_url,
            'title' => $request->title,
            'dateline' => $request->dateline,
            'grade_id' => $request->grade_id,
            'content' => $request->content,
        ]);

        return redirect()->route('teacher.task.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $task = Task::find($task)->first();
        if (!$task) {
            return redirect()->route('teacher.task.index')->with(['error' => 'Data tidak ditemukan!']);
        }
        $gradeSelected = Grade::find($task->grade_id);

        $grades = Grade::all();
        return view('teacher.task.edit', compact('task', 'grades', 'gradeSelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $task = Task::find($task)->first();
        if(!$task){
            return redirect()->route('teacher.task.index')->with(['error' => 'Data tidak ditemukan!']);
        }
        $task->task_url = $request->task_url;
        $task->title = $request->title;
        $task->dateline = $request->dateline;
        $task->grade_id= $request->grade_id;
        $task->content = $request->content;
        $task->save();

        return redirect()->route('teacher.task.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
