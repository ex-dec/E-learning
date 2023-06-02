<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::paginate(10);

        return view('teacher.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();

        return view('teacher.material.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);
        $file = $request->file('file');
        $file->storeAs('public/posts', $file->hashName());
        Material::create([
            'file_url' => $file->hashName(),
            'title' => $request->title,
            'grade_id' => $request->grade_id,
            'content' => $request->content,
            'link_video' => $request->link_video,
        ]);

        return redirect()->route('teacher.material.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        $material = Material::find($material)->first();
        if (! $material) {
            return redirect()->route('teacher.material.index')->with(['error' => 'Data tidak ditemukan!']);
        }
        $gradeSelected = Grade::find($material->grade_id);

        $grades = Grade::all();

        return view('teacher.material.edit', compact('material', 'grades', 'gradeSelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);
        $file = $request->file('file');
        $file->storeAs('public/posts', $file->hashName());

        $material->update([
            'file_url' => $file->hashName(),
            'nama' => $request->title,
            'grade_id' => $request->grade_id,
            'content' => $request->content,
            'link_video' => $request->link_video,
        ]);

        return redirect()->route('teacher.material.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $materials = Material::find($material)->first();
        if (! $materials) {
            return redirect()->route('teacher.material.index')->with(['error' => 'Data tidak ditemukan!']);
        }
        $material->delete();

        return redirect()->route('teacher.material.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
