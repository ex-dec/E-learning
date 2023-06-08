<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\ScheduleRequest;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\ScheduleLog;
use Illuminate\Support\Carbon;

class ScheduleController extends Controller
{
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
    public function store(ScheduleRequest $request)
    {
        Schedule::create([
            'title' => $request->title,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'day_schedule' => $request->day_schedule,
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
        $gradeSelected = Grade::find($schedule->grade_id);

        return view('teacher.schedule.edit', compact('schedule', 'grades', 'gradeSelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $schedules = Schedule::find($schedule)->first();

        if (!$schedules) {
            return redirect()->route('teacher.schedule.index')->with(['error' => 'Data tidak ditemukan!']);
        }

        $schedule->title = $request->title;
        $schedule->time_start = $request->time_start;
        $schedule->time_end = $request->time_end;
        $schedule->day_schedule = $request->day_schedule;
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
        $schedules = Schedule::find($schedule)->first();

        if (!$schedules) {
            return redirect()->route('teacher.schedule.index')->with(['error' => 'Data tidak ditemukan!']);
        }

        $schedule->delete();

        return redirect()->route('teacher.schedule.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function open(Schedule $schedule)
    {
        $schedule = Schedule::find($schedule)->first();

        $schedule->presence = true;
        $schedule->save();

        ScheduleLog::create([
            'schedule_id' => $schedule->id,
            'time_open' => Carbon::now()
        ]);

        return redirect()->route('teacher.schedule.index')->with(['success' => 'Presensi dibuka']);
    }

    public function close(Schedule $schedule)
    {
        $schedule = Schedule::find($schedule->id);

        $schedule->presence = false;
        $schedule->save();

        $scheduleLog = ScheduleLog::where('schedule_id', $schedule->id)->whereNull('time_close')->first();
        if ($scheduleLog) {
            $scheduleLog->time_close = Carbon::now();
            $scheduleLog->save();
        }

        return redirect()->route('teacher.schedule.index')->with(['success' => 'Presensi ditutup']);
    }
}
