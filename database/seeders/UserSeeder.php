<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'          => 'admin',
            'email'         => 'admin@admin.com',
            'password'      => bcrypt('admin'),
        ]);
        $admin->assignRole('admin');

        $guru = User::create([
            'name'          => 'teacher',
            'email'         => 'teacher@teacher.com',
            'password'      => bcrypt('teacher'),
        ]);
        $guru->assignRole('teacher');
    }
}
