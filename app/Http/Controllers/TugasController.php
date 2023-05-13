<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get tugas
       $tugas = Tugas::all();

        //render view with tugas
        return view('tugas.index', [
            'tugas' => $tugas
        ]);
        // return view('tugas.index', [
        //     'tugas' => $tugas
        // ]);
    }
    // /**
    //  * create
    //  *
    //  * @return void
    //  */
    public function create(Request $request)
    {
        $kelas = Kelas::all();
        return view('tugas.create', compact('kelas'));

    }

    // /**
    //  * store
    //  *
    //  * @param Request $request
    //  * @return void
    //  */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'title'     => 'required',
            'content'   => 'required',
        ]);
        // $file = $request->file('file');
        // dd($file);
        // $file->move(public_path('posts'), $file->hashName());
        // $file->storeAs('public/posts', $file->hashName());
        // dd($request);
        //create Tugas
        Tugas::create([
            'tugas_url'  => $request->tugas_url,
            'nama'     => $request->title,
            'kelas_id'     => $request->kelas,
            'content'   => $request->content,
            // 'content'   => $request->content,
        ]);

        //redirect to index
        return redirect()->route('tugas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

        /**
     * edit
     *
     * @param  mixed $tugas
     * @return void
     */
    public function edit(Tugas $tugas)
    {
        $tugas = Tugas::find($tugas)->first();
        // $kelas = Kelas::all();
        // return view('tugas.edit', [
        //     'tugas' => $tugas,
        //     'kelas' => $kelas,
        //     'content' => $content,
        // ]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $tugas
     * @return void
     */
    public function update(Request $request, Tugas $tugas)
    {
        //validate form
        // $this->validate($request, [
        //     'nama'     => $request->title,
        //     'kelas'     => $request->kelas,
        // ]);

        //check if image is uploaded
        $tugas->update([
            'nama'     => $request->title,
            'kelas'     => $request->kelas,
        ]);

        //redirect to index
        return redirect()->route('tugas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        //delete post
        $tugas = Tugas::find($id);
        $tugas->delete();

        //redirect to index
        return redirect()->route('tugas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
