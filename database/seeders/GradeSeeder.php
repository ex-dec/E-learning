<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;


class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat kelas
        $basic = Grade::create([
            'name' => 'basic'
        ]);
        $intermediate = Grade::create([
            'name' => 'intermediate'
        ]);
        $advance = Grade::create([
            'name' => 'advance'
        ]);
    }
}
