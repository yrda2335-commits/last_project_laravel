<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use App\Models\Skill;
use App\Models\Training;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 20 users
        $users = User::factory()->count(20)->create();

        // 20 profiles
        foreach ($users as $user) {
            Profile::factory()->create([
                'user_id' => $user->id,
            ]);
        }

        // 20 departments
        $departments = Department::factory()->count(20)->create();

        // 20 employees using existing users + departments
        $employees = collect();

        foreach ($users as $index => $user) {
            $employees->push(
                Employee::factory()->create([
                    'user_id' => $user->id,
                    'department_id' => $departments[$index]->id,
                ])
            );
        }

        // 20 projects
        $projects = Project::factory()->count(20)->create([
            'department_id' => fn () => $departments->random()->id,
        ]);

        // 20 tasks
        Task::factory()
            ->count(20)
            ->create([
                'project_id' => fn () => $projects->random()->id,
                'assigned_user_id' => fn () => $users->random()->id,
            ]);

        // 20 skills
        $skills = Skill::factory()->count(20)->create();

        // 20 trainings
        $trainings = Training::factory()->count(20)->create();

        // Project <-> Skills
        foreach ($projects as $project) {
            $project->skills()->attach(
                $skills->random(rand(2, 5))->pluck('id')->toArray(),
                [
                    'proficiency_level' => fake()->randomElement([
                        'beginner',
                        'intermediate',
                        'advanced',
                        'expert',
                    ]),
                ]
            );
        }

        // Employee <-> Trainings
        foreach ($employees as $employee) {
            $employee->trainings()->attach(
                $trainings->random(rand(1, 4))->pluck('id')->toArray(),
                [
                    'status' => fake()->randomElement([
                        'enrolled',
                        'completed',
                        'cancelled',
                    ]),
                ]
            );
        }
    }
}