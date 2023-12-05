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

    public function create()
    {
        $grades = Grade::all();
        return view('teacher.schedule.create', compact('grades'));
    }

    public function store(ScheduleRequest $request)
    {
        $validated = $request->validated();
        Schedule::create($validated);
        return redirect()->route('teacher.schedule.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Schedule $schedule)
    {
        $grades = Grade::all();
        $gradeSelected = Grade::find($schedule->grade_id);
        return view('teacher.schedule.edit', compact('schedule', 'grades', 'gradeSelected'));
    }

    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $validated = $request->validated();
        $this->checkSchedule($schedule);
        $schedule->update($validated);
        return redirect()->route('teacher.schedule.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Schedule $schedule)
    {
        $this->checkSchedule($schedule);
        $schedule->delete();
        return redirect()->route('teacher.schedule.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function open(Schedule $schedule)
    {
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

    private function checkSchedule(Schedule $schedule)
    {
        $schedule = Schedule::find($schedule)->first();
        if (!$schedule) {
            return redirect()->route('teacher.schedule.index')->with(['error' => 'Data tidak ditemukan!']);
        }
    }
}
