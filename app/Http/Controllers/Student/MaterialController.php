<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\UserHasGrade;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $grade = UserHasGrade::where('user_id', $userId)->first();
        $gradeId = $grade->grade_id;
        return view('student.material.index', compact('gradeId'));
    }
}
