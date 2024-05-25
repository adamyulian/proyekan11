<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
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
             Brand::factory()->create([
                 'name' => $faker->word,
                 'website_url' => $faker->domainName,
                 'industry'=> $faker->word,
                 'is_published' => $faker->boolean,
                 'user_id' => $faker->randomElement($userIds),
             ]);
         }
    }
}
