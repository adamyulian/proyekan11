<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use App\Models\Brand;
use App\Models\Component;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComponentSeeder extends Seeder
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

        // Get all brand IDs from the database
        $brandIds = Brand::pluck('id')->toArray();

        // Get all unit IDs from the database
        $unitIds = Unit::pluck('id')->toArray();

         // Define the possible types
        $types = ['Tenaga Kerja', 'Peralatan', 'Subkontraktor'];

        // Create 10 units with random user_id values
        for ($i = 0; $i < 10; $i++) {
            Component::factory()->create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'is_published' => $faker->boolean,
                'user_id' => $faker->randomElement($userIds),
                'type' => $faker->randomElement($types),
                'price' => $faker->randomFloat(2, 10, 1000), // Adjust the range as needed
                'unit_id'=> $faker->randomElement($unitIds),
                'brand_id'=> $faker->randomElement($brandIds),
            ]);
        }
    }
}
