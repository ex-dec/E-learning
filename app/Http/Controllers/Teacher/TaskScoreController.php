<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TaskScore;
use App\Models\Task;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class TaskScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scores = TaskScore::all();
        return view('teacher.score.index', compact('scores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('student')->get();
        $tasks = Task::all();
        $grades = Grade::all();
        return view('teacher.score.create', compact('users', 'tasks', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'task_id' => 'required',
            'grade_id' => 'required',
            'score' => 'required',
        ]);

        TaskScore::create([
            'user_id' => $request->user_id,
            'task_id' => $request->task_id,
            'grade_id' => $request->grade_id,
            'score' => $request->score,
        ]);

        return redirect()->route('teacher.score.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskScore $taskScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskScore $taskScore)
    {
        $users = User::role('student')->get();
        $tasks = Task::all();
        $grades = Grade::all();
        return view('teacher.score.edit', compact('users', 'tasks', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskScore $taskScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskScore $taskScore)
    {
        //
    }
}
