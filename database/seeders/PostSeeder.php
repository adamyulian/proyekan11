<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Clear existing data from the table
         DB::table('posts')->truncate();

        $client = new Client();
        $faker = Faker::create();

        // Generate dummy data for the specified columns
        for ($i = 0; $i < 10; $i++) {
            $user = User::inRandomOrder()->first(); // Get a random user

            // Fetch a random image from Lorem Picsum
            $response = $client->get('https://picsum.photos/200/300', ['stream' => true]);
            $imagePath = 'storage/dummy-image-' . $i . '.jpg'; // Save the image with a unique name
            file_put_contents(public_path($imagePath), $response->getBody()->getContents());

            // Generate a random title
            $title = 'Dummy Title ' . $i;

            DB::table('posts')->insert([
                'user_id' => $user->id, // Foreign key referencing the User model
                'slug' => Str::slug($title), // Correlate slug with title
                'title' => $title, // Title
                'content' => $faker->paragraph, // Generate dummy content using Faker
                'image' => $imagePath, // Path to the saved image
                'created_at' => now()
            ]);
        }
    }
}
