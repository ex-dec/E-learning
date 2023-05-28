<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = User::create([
            'name' => 'test',
            'email' => 'test@admin.com',
            'password' => bcrypt('test'),
        ]);
        $admin->assignRole('admin');
    }
}
