<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat kelas
        $basic = Grade::create([
            'name' => 'basic',
        ]);
        $intermediate = Grade::create([
            'name' => 'intermediate',
        ]);
        $advance = Grade::create([
            'name' => 'advance',
        ]);
        $lulus = Grade::create([
            'name' => 'passed',
        ]);
    }
}
