<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Unit;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate random data using Faker
        $faker = Faker::create();

        // Get all user IDs from the database
        $userIds = User::pluck('id')->toArray();

        // Get all unit IDs from the database
        $unitIds = Unit::pluck('id')->toArray();

        // Create 10 units with random user_id values
        for ($i = 0; $i < 10; $i++) {
            Task::factory()->create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'is_published' => $faker->boolean,
                'user_id' => $faker->randomElement($userIds),
                'unit_id'=> $faker->randomElement($unitIds),
            ]);
        }
    }
}
