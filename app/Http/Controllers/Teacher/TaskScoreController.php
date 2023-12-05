<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TaskScoreRequest;
use App\Models\TaskScore;
use App\Models\Task;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class TaskScoreController extends Controller
{
    public function index()
    {
        $scores = TaskScore::all();
        return view('teacher.score.index', compact('scores'));
    }

    public function create()
    {
        $users = User::role('student')->get();
        $tasks = Task::all();
        $grades = Grade::all();
        return view('teacher.score.create', compact('users', 'tasks', 'grades'));
    }

    public function store(TaskScoreRequest $request)
    {
        TaskScore::create([
            'user_id' => $request->user_id,
            'task_id' => $request->task_id,
            'grade_id' => $request->grade_id,
            'score' => $request->score,
        ]);
        return redirect()->route('teacher.score.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(TaskScore $taskScore)
    {
        $users = User::role('student')->get();
        $tasks = Task::all();
        $grades = Grade::all();
        return view('teacher.score.edit', compact('users', 'tasks', 'grades'));
    }

    public function update(Request $request, TaskScore $taskScore)
    {
        //
    }
}
