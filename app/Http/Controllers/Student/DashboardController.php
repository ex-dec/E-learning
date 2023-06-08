<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Schedule;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        $scheduleUser = Schedule::where('grade_id', auth()->user()->getGradeId())->first();
        $taskUser = Task::where('grade_id', auth()->user()->getGradeId())->first();
        $materialUser = Material::where('grade_id', auth()->user()->getGradeId())->first();
        $passedStatus = [];
        return view('student.dashboard', compact('schedules', 'scheduleUser', 'taskUser', 'materialUser'));
    }
}
