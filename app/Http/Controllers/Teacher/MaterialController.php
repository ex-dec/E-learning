<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\MaterialRequest;
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
    public function store(MaterialRequest $request)
    {
        $file = $request->file('file');
        $fileUrl = $file ? $file->storeAs('public/posts', $file->hashName()) : null;
        $fileUrl = str_replace("public/posts/", "", $fileUrl);
        Material::create([
            'title' => $request->title,
            'grade_id' => $request->grade_id,
            'content' => $request->content,
            'file_url' => $fileUrl,
            'video_url' => $request->video_url,
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
        if (!$material) {
            return redirect()->route('teacher.material.index')->with(['error' => 'Data tidak ditemukan!']);
        }
        $gradeSelected = Grade::find($material->grade_id);

        $grades = Grade::all();

        return view('teacher.material.edit', compact('material', 'grades', 'gradeSelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialRequest $request, Material $material)
    {
        $file = $request->file('file');
        $fileUrl = $file ? $file->storeAs('public/posts', $file->hashName()) : null;
        $fileUrl = str_replace("public/posts/", "", $fileUrl);
        $material->update([
            'nama' => $request->title,
            'grade_id' => $request->grade_id,
            'content' => $request->content,
            'file_url' => $fileUrl,
            'video_url' => $request->video_url,
        ]);
        return redirect()->route('teacher.material.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $materials = Material::find($material)->first();
        if (!$materials) {
            return redirect()->route('teacher.material.index')->with(['error' => 'Data tidak ditemukan!']);
        }
        $material->delete();

        return redirect()->route('teacher.material.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
