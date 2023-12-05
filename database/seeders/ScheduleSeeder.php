<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $this->createBasicSchedule();
        $this->createIntermediateSchedule();
        $this->createAdvanceSchedule();
    }

    private function createBasicSchedule(): void
    {
        Schedule::create([
            'title' => 'Day 1 Basic Class',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'day_schedule' => 'senin',
            'link' => 'https://meet.google.com/basic',
            'grade_id' => '1',
        ]);
    }

    private function createIntermediateSchedule(): void
    {
        Schedule::create([
            'title' => 'Day 1 Intermediate Class',
            'time_start' => '14:00:00',
            'time_end' => '15:00:00',
            'day_schedule' => 'selasa',
            'link' => 'https://meet.google.com/intermediate',
            'grade_id' => '2',
        ]);
    }

    private function createAdvanceSchedule(): void
    {
        Schedule::create([
            'title' => 'Day 1 Advance Class',
            'time_start' => '15:00:00',
            'time_end' => '16:00:00',
            'day_schedule' => 'rabu',
            'link' => 'https://meet.google.com/advance',
            'grade_id' => '3',
        ]);
    }
}
