<?php

namespace Database\Factories;

use App\Models\Repository;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

final class EndpointJobFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'repository_id' => Repository::factory()->create(),
            'interval_id' => DB::table(table: 'intervals')->inRandomOrder()->first(),
            'active' => fake()->boolean(),
        ];
    }
}
