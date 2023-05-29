<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Grade;
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
        $this->validate($request, [
            'title'     => 'required|min:5',
            'content'   => 'required|min:10',
        ]);
        $file = $request->file('file');
        // dd($file);
        // $file->move(public_path('posts'), $file->hashName());
        $file->storeAs('public/posts', $file->hashName());
        // dd($request);
        //create Materi
        Material::create([
            'file_url'  => $file->hashName(),
            'nama'     => $request->title,
            'kelas'     => $request->kelas,
            'content'   => $request->content,
            'link_video' =>$request->link_video
            // 'content'   => $request->content,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        //
    }
}
