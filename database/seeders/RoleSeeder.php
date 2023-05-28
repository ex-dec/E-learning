<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $student = Role::create([
            'name' => 'student',
            'guard_name' => 'web',
        ]);

        $guru = Role::create([
            'name' => 'teacher',
            'guard_name' => 'web',
        ]);
    }
}
