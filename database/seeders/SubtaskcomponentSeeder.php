<?php

namespace Database\Seeders;

use App\Models\Subtask;
use App\Models\Component;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\SubtaskComponent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubtaskcomponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data from the table
        // SubtaskComponent::truncate();

        // Generate random data using Faker
        $faker = Faker::create();

        // Get all user IDs from the database
        $subtaskIds = Subtask::pluck('id')->toArray();

        // Get all unit IDs from the database
        $componentIds = Component::pluck('id')->toArray();

        // Create 10 units with random user_id values
        for ($i = 0; $i < 10; $i++) {
            SubtaskComponent::factory()->create([
                'subtask_id'=> $faker->randomElement($subtaskIds),
                'component_id'=> $faker->randomElement($componentIds),
                'coeff'=> $faker->randomFloat(2, 1, 10)
            ]);
        }
    }
}
