<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basic1 = Schedule::create([
            'title' => 'Day 1 Basic Class',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'day_schedule' => 'senin',
            'link' => 'https://meet.google.com/',
            'grade_id' => '1',
        ]);
        // $basic2 = Schedule::create([
        //     'title' => 'Day 2 Basic Class',
        //     'time_start' => '15:00:00',
        //     'time_end' => '16:30:00',
        //     'day_schedule' => 'kamis',
        //     'link' => 'https://meet.google.com/',
        //     'grade_id' => '1',
        // ]);
        $intermediate1 = Schedule::create([
            'title' => 'Day 1 Intermediate Class',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'day_schedule' => 'selasa',
            'link' => 'https://meet.google.com/',
            'grade_id' => '2',
        ]);
        // $intermediate2 = Schedule::create([
        //     'title' => 'Day 2 Intermediate Class',
        //     'time_start' => '15:00:00',
        //     'time_end' => '16:30:00',
        //     'day_schedule' => 'jumat',
        //     'link' => 'https://meet.google.com/',
        //     'grade_id' => '2',
        // ]);
        $advance1 = Schedule::create([
            'title' => 'Day 1 Advance Class',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'day_schedule' => 'rabu',
            'link' => 'https://meet.google.com/',
            'grade_id' => '3',
        ]);
        // $advance2 = Schedule::create([
        //     'title' => 'Day 2 Advance Class',
        //     'time_start' => '15:00:00',
        //     'time_end' => '16:30:00',
        //     'day_schedule' => 'sabtu',
        //     'link' => 'https://meet.google.com/',
        //     'grade_id' => '3',
        // ]);
    }
}
