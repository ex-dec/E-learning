<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserHasGrade;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->createAdminUser();
        $this->createTeacherUser();
        $this->createStudentUser();
    }

    public function createAdminUser()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('admin');
    }

    public function createTeacherUser()
    {
        $teacher = User::create([
            'name' => 'admin guru',
            'email' => 'adminguru@admin.com',
            'password' => bcrypt('adminguru'),
        ]);
        $teacher->assignRole('teacher');
    }

    public function createStudentUser()
    {
        $student1 = User::create([
            'name' => 'admin siswa',
            'email' => 'adminsiswa@admin.com',
            'password' => bcrypt('adminsiswa'),
        ]);
        $student1->assignRole('student');
        UserHasGrade::create([
            'user_id' => $student1->id,
            'grade_id' => '1',
        ]);
    }
}
