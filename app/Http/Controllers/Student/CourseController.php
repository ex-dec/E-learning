<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Material;
use App\Models\Presence;
use App\Models\ScheduleLog;
use App\Models\Task;
use App\Models\TaskScore;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function basicDashboard()
    {
        $schedule = Schedule::where('grade_id', '1')->first();
        $scheduleId = $schedule->id;
        $schedules = Schedule::where('grade_id', '1')->get()->first();
        $presence = Presence::whereExists(function ($query) use ($scheduleId) {
            $query->select('id')
                ->from('schedule_logs')
                ->whereColumn('schedule_logs.schedule_id', 'presences.schedule_id')
                ->where('presences.schedule_id', $scheduleId)
                ->whereRaw('presences.created_at >= schedule_logs.time_open')
                ->whereRaw('presences.created_at <= schedule_logs.time_close');
        })->orderBy('created_at', 'DESC')->get();
        $scheduleLog = Presence::whereExists(function ($query) use ($scheduleId) {
            $query->select('id')
                ->from('schedule_logs')
                ->whereColumn('schedule_logs.schedule_id', 'presences.schedule_id')
                ->where('presences.schedule_id', $scheduleId)
                ->whereRaw('presences.created_at >= schedule_logs.time_open');
        })->where('created_at', '>', function ($query) use ($scheduleId) {
            $query->select('time_open')
                ->from('schedule_logs')
                ->where('schedule_id', $scheduleId)
                ->whereNull('time_close');
        })->get();
        $status = $scheduleLog->isNotEmpty();
        return view('student.course.basic.index', compact('schedules', 'presence', 'status'));
    }

    public function intermediateDashboard()
    {
        $schedule = Schedule::where('grade_id', '2')->first();
        $scheduleId = $schedule->id;
        $schedules = Schedule::where('grade_id', '2')->get()->first();
        $presence = Presence::whereExists(function ($query) use ($scheduleId) {
            $query->select('id')
                ->from('schedule_logs')
                ->whereColumn('schedule_logs.schedule_id', 'presences.schedule_id')
                ->where('presences.schedule_id', $scheduleId)
                ->whereRaw('presences.created_at >= schedule_logs.time_open')
                ->whereRaw('presences.created_at <= schedule_logs.time_close');
        })->orderBy('created_at', 'DESC')->get();
        $scheduleLog = Presence::whereExists(function ($query) use ($scheduleId) {
            $query->select('id')
                ->from('schedule_logs')
                ->whereColumn('schedule_logs.schedule_id', 'presences.schedule_id')
                ->where('presences.schedule_id', $scheduleId)
                ->whereRaw('presences.created_at >= schedule_logs.time_open');
        })->where('created_at', '>', function ($query) use ($scheduleId) {
            $query->select('time_open')
                ->from('schedule_logs')
                ->where('schedule_id', $scheduleId)
                ->whereNull('time_close');
        })->orderBy('created_at', 'DESC')->get();
        $status = $scheduleLog->isNotEmpty();
        return view('student.course.intermediate.index', compact('schedules', 'presence', 'status'));
    }

    public function advanceDashboard()
    {
        $schedule = Schedule::where('grade_id', '3')->first();
        $scheduleId = $schedule->id;
        $schedules = Schedule::where('grade_id', '3')->get()->first();
        $presence = Presence::whereExists(function ($query) use ($scheduleId) {
            $query->select('id')
                ->from('schedule_logs')
                ->whereColumn('schedule_logs.schedule_id', 'presences.schedule_id')
                ->where('presences.schedule_id', $scheduleId)
                ->whereRaw('presences.created_at >= schedule_logs.time_open')
                ->whereRaw('presences.created_at <= schedule_logs.time_close');
        })->orderBy('created_at', 'DESC')->get();
        $scheduleLog = Presence::whereExists(function ($query) use ($scheduleId) {
            $query->select('id')
                ->from('schedule_logs')
                ->whereColumn('schedule_logs.schedule_id', 'presences.schedule_id')
                ->where('presences.schedule_id', $scheduleId)
                ->whereRaw('presences.created_at >= schedule_logs.time_open');
        })->where('created_at', '>', function ($query) use ($scheduleId) {
            $query->select('time_open')
                ->from('schedule_logs')
                ->where('schedule_id', $scheduleId)
                ->whereNull('time_close');
        })->orderBy('created_at', 'DESC')->get();
        $status = $scheduleLog->isNotEmpty();
        return view('student.course.advance.index', compact('schedules', 'presence', 'status'));
    }

    public function basicMaterial()
    {
        $materials = Material::where('grade_id', '1')->whereNotNull('file_url')->get();
        $schedules = Schedule::where('grade_id', '1')->get()->first();
        return view('student.course.basic.material', compact('schedules', 'materials'));
    }

    public function intermediateMaterial()
    {
        $materials = Material::where('grade_id', '2')->get();
        $schedules = Schedule::where('grade_id', '2')->get()->first();
        return view('student.course.intermediate.material', compact('schedules', 'materials'));
    }

    public function advanceMaterial()
    {
        $materials = Material::where('grade_id', '3')->get();
        $schedules = Schedule::where('grade_id', '3')->get()->first();
        return view('student.course.advance.material', compact('schedules', 'materials'));
    }

    public function basicVideo()
    {
        $materials = Material::where('grade_id', '1')->whereNotNull('video_url')->get();
        $schedules = Schedule::where('grade_id', '1')->get()->first();
        return view('student.course.basic.video', compact('schedules', 'materials'));
    }

    public function intermediateVideo()
    {
        $materials = Material::where('grade_id', '2')->whereNotNull('video_url')->get();
        $schedules = Schedule::where('grade_id', '2')->get()->first();
        return view('student.course.basic.video', compact('schedules', 'materials'));
    }

    public function advanceVideo()
    {
        $materials = Material::where('grade_id', '3')->whereNotNull('video_url')->get();
        $schedules = Schedule::where('grade_id', '3')->get()->first();
        return view('student.course.basic.video', compact('schedules', 'materials'));
    }

    public function basicTask()
    {
        $taskScore = TaskScore::where('user_id', Auth::user()->id)->get();
        $tasks = Task::where('grade_id', '1')->get();
        $schedules = Schedule::where('grade_id', '1')->get()->first();
        return view('student.course.basic.task', compact('tasks', 'schedules', 'taskScore'));
    }

    public function intermediateTask()
    {
        $taskScore = TaskScore::where('user_id', Auth::user()->id)->get();
        $tasks = Task::where('grade_id', '2')->get();
        $schedules = Schedule::where('grade_id', '2')->get()->first();
        return view('student.course.basic.task', compact('tasks', 'schedules', 'taskScore'));
    }

    public function advanceTask()
    {
        $taskScore = TaskScore::where('user_id', Auth::user()->id)->get();
        $tasks = Task::where('grade_id', '3')->get();
        $schedules = Schedule::where('grade_id', '3')->get()->first();
        return view('student.course.basic.task', compact('tasks', 'schedules', 'taskScore'));
    }

    public function basicPresence(Schedule $schedule)
    {
        $user_id = Auth::user()->id;
        $schedule_id = $schedule->id;
        Presence::create([
            'user_id' => $user_id,
            'schedule_id' => $schedule_id,
        ]);
        $schedules = Schedule::where('grade_id', '1')->get()->first();
        return redirect()->route('student.course.basic');
    }

    public function intermediatePresence(Schedule $schedule)
    {
        $user_id = Auth::user()->id;
        $schedule_id = $schedule->id;
        Presence::create([
            'user_id' => $user_id,
            'schedule_id' => $schedule_id,
        ]);
        $schedules = Schedule::where('grade_id', '2')->get()->first();
        return redirect()->route('student.course.intermediate');
    }

    public function advancePresence(Schedule $schedule)
    {
        $user_id = Auth::user()->id;
        $schedule_id = $schedule->id;
        Presence::create([
            'user_id' => $user_id,
            'schedule_id' => $schedule_id,
        ]);
        $schedules = Schedule::where('grade_id', '3')->get()->first();
        return redirect()->route('student.course.advance');
    }
}
