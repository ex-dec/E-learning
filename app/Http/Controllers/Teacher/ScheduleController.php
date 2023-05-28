<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('teacher.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();

        return view('teacher.schedule.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jam_jadwal' => 'required',
            'tanggal_jadwal' => 'required',
            'grade_id' => 'required',
            'link' => 'required'
        ]);

        $tgl = strtotime($request->tanggal_jadwal);
        $hari = date('l', $tgl);

        Schedule::create([
            'nama' => $request->nama,
            'jam_jadwal' => $request->jam_jadwal,
            'hari_jadwal' => $hari,
            'tanggal_jadwal' => $request->tanggal_jadwal,
            'link' => $request->link,
            'grade_id' => $request->grade_id,
        ]);

        return redirect()->route('teacher.schedule.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $grades = Grade::all();

        return view('teacher.schedule.edit', compact('schedule', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'nama' => 'required',
            'jam_jadwal' => 'required',
            'hari_jadwal' => 'required',
            'tanggal_jadwal' => 'required',
            'link' => 'required',
            'grade_id' => 'required',
        ]);

        $tgl = strtotime($request->tanggal_jadwal);
        $hari = date('l', $tgl);

        $schedule = Schedule::find($schedule);

        if (!$schedule) {
            return redirect()->route('teacher.schedule.index')->with(['error' => 'Data tidak ditemukan!']);
        }

        $schedule->nama = $request->nama;
        $schedule->jam_jadwal = $request->jam_jadwal;
        $schedule->hari_jadwal = $hari;
        $schedule->tanggal_jadwal = $request->tanggal_jadwal;
        $schedule->link = $request->link;
        $schedule->grade_id = $request->grade_id;
        $schedule->save();

        return redirect()->route('teacher.schedule.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedules = Schedule::find($schedule);

        if (!$schedules) {
            return redirect()->route('teacher.schedule.index')->with(['error' => 'Data tidak ditemukan!']);
        }

        $schedule->delete();

        return redirect()->route('teacher.schedule.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function close(Schedule $schedule)
    {
        $schedule = Schedule::find($schedule);

        $schedule->buka = false;
        $schedule->save();

        return redirect('teacher.schedule.index')->with(['success' => 'Presensi ditutup']);
    }

    public function open(Schedule $schedule)
    {
        $schedule = Schedule::find($schedule);

        $schedule->buka = true;
        $schedule->save();

        return redirect('teacher.schedule.index')->with(['success' => 'Presensi dibuka']);
    }
}
