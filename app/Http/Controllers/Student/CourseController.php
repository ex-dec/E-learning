<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Material;

class CourseController extends Controller
{
    public function basicDashboard()
    {
        $schedules = Schedule::where('grade_id', '1')->get()->first();
        return view('student.course.basic.index', compact('schedules'));
    }

    public function intermediateDashboard()
    {
        $schedules = Schedule::where('grade_id', '2')->get()->first();
        return view('student.course.intermediate.index', compact('schedules'));
    }

    public function advanceDashboard()
    {
        $schedules = Schedule::where('grade_id', '3')->get()->first();
        return view('student.course.advance.index', compact('schedules'));
    }

    public function basicMaterial()
    {
        $materials = Material::where('grade_id', '1')->get();
        $schedules = Schedule::where('grade_id', '1')->get()->first();
        return view('student.course.basic.material', compact('schedules', 'materials'));
    }
    public function intermediateMaterial()
    {
        $materials = Material::where('grade_id', '2')->get();
        $schedules = Schedule::where('grade_id', '2')->get()->first();
        return view('student.course.intermediate.material', compact('schedules', 'materials'));
    }
    public function advanceMaterial()
    {
        $materials = Material::where('grade_id', '3')->get();
        $schedules = Schedule::where('grade_id', '3')->get()->first();
        return view('student.course.advance.material', compact('schedules', 'materials'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
