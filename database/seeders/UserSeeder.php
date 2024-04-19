<?php

namespace Database\Seeders;

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
