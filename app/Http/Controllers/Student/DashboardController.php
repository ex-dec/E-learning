<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;

class DashboardController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();

        return view('student.dashboard', compact('schedules'));
    }
}
