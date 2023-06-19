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
        $intermediate1 = Schedule::create([
            'title' => 'Day 1 Intermediate Class',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'day_schedule' => 'selasa',
            'link' => 'https://meet.google.com/',
            'grade_id' => '2',
        ]);
        $advance1 = Schedule::create([
            'title' => 'Day 1 Advance Class',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'day_schedule' => 'rabu',
            'link' => 'https://meet.google.com/',
            'grade_id' => '3',
        ]);
    }
}
