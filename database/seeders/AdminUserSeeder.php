<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'info@quickreimbourseexpertsco.online',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('admin');
    }
}
