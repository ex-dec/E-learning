<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get materi
        $materis = Materi::paginate(5);

        
        //render view with materi
        return view('materis.index', compact('materis'));
        // return view('materis.index', [
        //     'materis' => $materis
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
        return view('materis.create', compact('kelas'));
    
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
            'title'     => 'required|min:5',
            'content'   => 'required|min:10',
        ]);
        $file = $request->file('file');
        // dd($file);
        // $file->move(public_path('posts'), $file->hashName());
        $file->storeAs('public/posts', $file->hashName());
        // dd($request);
        //create Materi
        Materi::create([
            'file_url'  => $file->hashName(),
            'nama'     => $request->title,
            'kelas'     => $request->kelas,
            'content'   => $request->content,
            'link_video' =>$request->link_video
            // 'content'   => $request->content,
        ]);

        //redirect to index
        return redirect()->route('materis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

        /**
     * edit
     *
     * @param  mixed $materi
     * @return void
     */
    public function edit(Materi $materi)
    {
        $materi = Materi::find($materi)->first();
        $kelas = Kelas::all();
        return view('materis.edit', [
            'file_url'  => $materi->file_url,
            'materi' => $materi,
            'kelas' => $kelas,
            'content' => $materi->content,
            'link_video'=>$materi->link_video
        ]);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $materi
     * @return void
     */
    public function update(Request $request, Materi $materi)
    {
        //validate form
        // $this->validate($request, [
        //     'nama'     => $request->title,
        //     'kelas'     => $request->kelas,
        // ]);
        $file = $request->file('file');
        $file->storeAs('public/posts', $file->hashName());


        //check if image is uploaded
        $materi->update([
            'file_url'  => $file->hashName(),
            'nama'     => $request->title,
            'kelas'     => $request->kelas,
            'content' => $request->content,
            'link_video'=>$request->link_video
        ]);

        //redirect to index
        return redirect()->route('materis.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Materi $materi)
    {
        //delete post
        $materi->delete();

        //redirect to index
        return redirect()->route('materis.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}