<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserHasGrade;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('admin');
        $test = User::create([
            'name' => 'test',
            'email' => 'test@admin.com',
            'password' => bcrypt('test'),
        ]);
        $test->assignRole('admin');
        $guru = User::create([
            'name' => 'admin guru',
            'email' => 'adminguru@admin.com',
            'password' => bcrypt('adminguru'),
        ]);
        $guru->assignRole('teacher');
        $siswa = User::create([
            'name' => 'admin siswa',
            'email' => 'adminsiswa@admin.com',
            'password' => bcrypt('adminsiswa'),
        ]);
        $siswa->assignRole('student');
        UserHasGrade::create([
            'user_id' => $siswa->id,
            'grade_id' => '1',
        ]);
    }
}
