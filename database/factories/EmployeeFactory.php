<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'department_id' => Department::factory(),
            'job_title' => fake()->jobTitle(),
            'hired_at' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
        ];
    }
}