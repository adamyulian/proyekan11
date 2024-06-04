<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Subtask;
use App\Models\TaskSubtask;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSubtaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data from the table
        TaskSubtask::truncate();

        // Generate random data using Faker
        $faker = Faker::create();

        // Get all user IDs from the database
        $subtaskIds = Subtask::pluck('id')->toArray();

        // Get all unit IDs from the database
        $taskIds = Task::pluck('id')->toArray();

        // Create 10 units with random user_id values
        for ($i = 0; $i < 10; $i++) {
            TaskSubtask::factory()->create([
                'subtask_id'=> $faker->randomElement($subtaskIds),
                'task_id'=> $faker->randomElement($taskIds),
                'coeff'=> $faker->randomFloat(2, 1, 10)
            ]);
        }
    }
}
