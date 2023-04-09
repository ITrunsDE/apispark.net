<?php

namespace Database\Factories;

use App\Models\Repository;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Repository>
 */
class RepositoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'name' => fake()->name(),
            'ingest_token' => fake()->uuid(),
            'active' => fake()->boolean(),
            'verification_token' => fake()->uuid(),
            'base_url' => 'https://'.fake()->randomElement(config('logscale.base_urls')),
        ];
    }
}
