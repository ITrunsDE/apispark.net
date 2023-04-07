<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntervalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table(table: 'intervals')->insert([
            [
                'name' => 'every minute',
                'interval' => 1,
            ], [
                'name' => 'every 10 minutes',
                'interval' => 10,
            ], [
                'name' => 'every 15 minutes',
                'interval' => 15,
            ], [
                'name' => 'every 30 minutes',
                'interval' => 30,
            ], [
                'name' => 'every 45 minutes',
                'interval' => 45,
            ], [
                'name' => 'every hour',
                'interval' => 60,
            ], [
                'name' => 'every 2 hours',
                'interval' => 120,
            ], [
                'name' => 'every 4 hours',
                'interval' => 240,
            ], [
                'name' => 'every 6 hours',
                'interval' => 360,
            ], [
                'name' => 'every 12 hours',
                'interval' => 720,
            ], [
                'name' => 'every 24 hours',
                'interval' => 1440,
            ],
        ]);
    }
}
