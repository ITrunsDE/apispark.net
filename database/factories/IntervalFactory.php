<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class IntervalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'interval' => fake()->numberBetween(1, 604.800),
        ];
    }
}
