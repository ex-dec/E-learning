<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();

        return view('admin.grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.grade.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $grade = Grade::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.grade.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('admin.grade.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($grade->id)],
        ]);
        $grade = Grade::find($grade)->first();

        if (!$grade) {
            return redirect()->route('admin.grade.index')->with(['error' => 'Data tidak ditemukan!']);
        }
        $grade->name = $request->name;
        $grade->save();
        return redirect()->route('admin.grade.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('admin.grade.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
