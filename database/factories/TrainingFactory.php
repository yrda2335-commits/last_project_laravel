<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'provider' => fake()->company(),
            'starts_at' => fake()->dateTimeBetween('-6 months', '+3 months')->format('Y-m-d'),
            'ends_at' => fake()->dateTimeBetween('+3 months', '+9 months')->format('Y-m-d'),
        ];
    }
}