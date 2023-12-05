<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        Grade::create(['name' => 'basic',]);
        Grade::create(['name' => 'intermediate',]);
        Grade::create(['name' => 'advance',]);
        Grade::create(['name' => 'passed',]);
    }
}
