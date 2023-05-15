<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Branch;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->words(2, true)),
            'subject_id' => Subject::query()->inRandomOrder()->value('id'),
            'branch_id' => Branch::query()->inRandomOrder()->value('id'),
            'user_id' => User::query()->where('isTeacher', 'true')->inRandomOrder()->value('id'),
            'startDate' =>fake()->date(),            
        ];
    }
}
