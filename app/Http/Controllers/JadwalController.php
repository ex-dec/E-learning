<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Kelas;



class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::get();

        return view('jadwal.index', compact('jadwal'));
    }

    public function show(Jadwal $jadwal)
    {
        $data = Jadwal::find($jadwal)->first;

        return view('jadwal.detail', compact('data'));
    }

    public function create()
    {
        $jadwal = Jadwal::all();
        $kelas = Kelas::all();

        return view('jadwal.create', compact('jadwal','kelas'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'jam_jadwal' => 'required',
            'tanggal_jadwal' => 'required',
            'kelas_id' => 'required',
            'link' => 'required'
        ]);


        $tgl = strtotime($request->tanggal_jadwal);
        $hari = date('l', $tgl);

        Jadwal::create([
            'nama' => $request->nama,
            'jam_jadwal' => $request->jam_jadwal,
            'hari_jadwal' => $hari,
            'tanggal_jadwal' => $request->tanggal_jadwal,
            'link' => $request->link,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Jadwal $jadwal)
    {
        $jadwal = Jadwal::find($jadwal)->first();
        $kelas = Kelas::all();

        return view('jadwal.edit', compact('jadwal','kelas'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'jam_jadwal' => 'required',
        //     'hari_jadwal' => 'required',
        //     'tanggal_jadwal' => 'required',
        //     'link' => 'required',
        //     'kelas_id' => 'required',
        // ]);
        dd($request);
        $tgl = strtotime($request->tanggal_jadwal);
        $hari = date('l', $tgl);

        $jadwal = Jadwal::find($jadwal);

        $jadwal->nama = $request->nama;
        $jadwal->jam_jadwal = $request->jam_jadwal;
        $jadwal->hari_jadwal = $hari;
        $jadwal->tanggal_jadwal = $request->tanggal_jadwal;
        $jadwal->link = $request->link;
        $jadwal->kelas_id = $request->kelas_id;
        $jadwal->save();

        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function close($id)
    {
        $jadwal = Jadwal::find($id);

        $jadwal->buka = false;
        $jadwal->save();

        return redirect('jadwal.index')->with(['success' => 'Presensi ditutup']);
    }

    public function open($id)
    {
        $jadwal = Jadwal::find($id);

        $jadwal->buka = true;
        $jadwal->save();

        return redirect('jadwal.index')->with(['success' => 'Presensi dibuka']);
    }
}
