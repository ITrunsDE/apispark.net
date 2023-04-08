<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create test user
        DB::table(table: 'users')->insert([
            'name' => 'Sebastian',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);

        // create test repository
        DB::table(table: 'repositories')->insert([
            'user_id' => 1,
            'name' => 'Repo_Test',
            'ingest_token' => 'b252f742-a20e-46cd-a15a-542205cab68c',
            'active' => 1,
        ]);

        // create test endppint
        DB::table(table: 'endpoints')->insert([
            'user_id' => 1,
            'name' => 'Endpoint_Test',
            'url' => 'https://httpbin.org/json',
            'active' => 1,
        ]);

    }
}
