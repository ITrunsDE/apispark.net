<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

final class EndpointFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'name' => fake()->name(),
            'url' => fake()->url(),
            'headers' => fake()->randomElements([['Accept' => 'application+json.vnd', 'Authentication' => 'Bearer: 1234'], ['Authentication' => 'Bearer: 1234']]),
            'active' => fake()->boolean(),
        ];
    }
}
