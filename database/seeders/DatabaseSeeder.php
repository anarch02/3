<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\AdminUser::factory(3)->create();
        \App\Models\Branch::factory(2)->create();
        \App\Models\Subject::factory(3)->create();
        \App\Models\User::factory(50)->create();
        \App\Models\Course::factory(3)->create();
        \App\Models\Group::factory(5)->create();
        \App\Models\Attendance::factory(100)->create();

        $groups = Group::all();
        $users = User::all();
        foreach ($groups as $group) {
            $group->users()->attach($users->random(rand(1, 5)));
            $group->save();
        }

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'login' => 'user',
            'password' => bcrypt('12345678')
        ]);

        \App\Models\AdminUser::factory()->create([
            'name' => 'Test User',
            'login' => 'admin',
            'password' => bcrypt('12345678')
        ]);
    }
}
