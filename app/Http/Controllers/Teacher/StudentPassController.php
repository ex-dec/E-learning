<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Presence;
use App\Models\Schedule;
use App\Models\ScheduleLog;
use App\Models\StudentPass;
use App\Models\Task;
use App\Models\TaskScore;
use App\Models\User;
use App\Models\UserHasGrade;

class StudentPassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::role('student')->get();
        $studentObj = [];
        foreach ($students as $student) {
            $namaUser = $student->name;
            $hasGrade = UserHasGrade::where('user_id', $student->id)->first();
            if ($hasGrade) {
                $schedule = Schedule::where('grade_id', $hasGrade->grade->id)->first();
                if ($schedule) {
                    $scheduleLog = ScheduleLog::where('schedule_id', $schedule->id)->get();
                    $presensiUser = Presence::where('schedule_id', $schedule->id)->where('user_id', $student->id)->get();
                    $scheduleLogCount = $scheduleLog->count();
                    $studentPresenceCount = $presensiUser->count();
                    $task = Task::where('grade_id', $hasGrade->grade->id)->get();
                    $taskScore = TaskScore::where('user_id', $student->id)->where('grade_id', $hasGrade->grade->id)->sum('score');
                    $taskCount = $task->count();

                    if ($scheduleLogCount > 0) {
                        if ($studentPresenceCount > 0) {
                            $presencePercentage = ($studentPresenceCount / 4) * 100;
                        } else {
                            $presencePercentage = 0;
                        }
                    } else {
                        $presencePercentage = 0;
                    }

                    if ($taskCount > 0) {
                        if ($taskScore > 0) {
                            $averageScore = $taskScore / $taskCount;
                        } else {
                            $averageScore = 0;
                        }
                    } else {
                        $averageScore = 0;
                    }
                    $pass = false;
                    if ($averageScore >= 70 && $presencePercentage >= 100) {
                        $pass = true;
                    }
                    $studentObj[] = [
                        'studentId' => $student->id,
                        'name' => $namaUser,
                        'grade' => $hasGrade->grade->name,
                        'presencePercentage' => $presencePercentage,
                        'averageScore' => $averageScore,
                        'pass' => $pass
                    ];
                }
            }
        }
        return view('teacher.pass.index', compact('studentObj'));
    }

    public function store($id)
    {
        $student = User::where('id', $id)->first();
        $grade = UserHasGrade::where('user_id', $student->id)->first();
        StudentPass::create([
            'user_id' => $student->id,
            'grade_id' => $grade->grade->id
        ]);
        $grade->grade_id++;
        $grade->save();
        return redirect()->route('teacher.pass.index');
    }
}
