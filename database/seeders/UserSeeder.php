<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Check if an admin user already exists
       $adminEmail = 'admin@gmail.com';
       $adminExists = User::where('email', $adminEmail)->exists();

       // Create an admin user only if it does not already exist
       if (!$adminExists) {
           User::factory()->create([
               'name' => 'admin',
               'email' => $adminEmail,
               'email_verified_at' => now(),
               'password' => Hash::make('password'),
           ]);
       }

       // Insert dummy user data
       for ($i = 1; $i <= 10; $i++) {
           DB::table('users')->insert([
               'name' => 'User ' . $i,
               'email' => 'user' . $i . '@example.com',
               'email_verified_at' => now(),
               'password' => Hash::make('password'),
           ]);
       }
    }
}
