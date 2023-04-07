<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // run additional seeders
        $this->call([
            IntervalSeeder::class,
            TestUserSeeder::class,
        ]);
    }
}
