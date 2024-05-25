<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UnitSeeder extends Seeder
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

         // Create 10 units with random user_id values
         for ($i = 0; $i < 10; $i++) {
             Unit::factory()->create([
                 'name' => $faker->word,
                 'description' => $faker->sentence,
                 'is_published' => $faker->boolean,
                 'user_id' => $faker->randomElement($userIds),
             ]);
         }
    }
}
