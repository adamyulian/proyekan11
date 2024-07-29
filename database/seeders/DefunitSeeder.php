<?php

namespace Database\Seeders;

use App\Models\Defunit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DefunitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing data from the table
        DB::table('defunits')->truncate();

        $units = [
            ['name' => 'M2', 'description' => 'meter persegi', 'is_published' => true, 'user_id' => 1],
            ['name' => 'M3', 'description' => 'meter kubik', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Kg', 'description' => 'kilogram', 'is_published' => true, 'user_id' => 1],
            ['name' => 'L', 'description' => 'liter', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Ton', 'description' => 'ton', 'is_published' => true, 'user_id' => 1],
            ['name' => 'M', 'description' => 'meter', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Cm', 'description' => 'centimeter', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Mm', 'description' => 'milimeter', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Ha', 'description' => 'hektar', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Unit', 'description' => 'unit', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Pasang', 'description' => 'pasang', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Lusin', 'description' => 'lusin', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Kodi', 'description' => 'kodi', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Rim', 'description' => 'rim', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Batang', 'description' => 'batang', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Biji', 'description' => 'biji', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Box', 'description' => 'box', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Drum', 'description' => 'drum', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Galon', 'description' => 'galon', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Pack', 'description' => 'pack', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Kaleng', 'description' => 'kaleng', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Botol', 'description' => 'botol', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Sachet', 'description' => 'sachet', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Gelas', 'description' => 'gelas', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Cangkir', 'description' => 'cangkir', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Kantong', 'description' => 'kantong', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Amplop', 'description' => 'amplop', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Paket', 'description' => 'paket', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Bungkus', 'description' => 'bungkus', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Karung', 'description' => 'karung', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Slop', 'description' => 'slop', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Buah', 'description' => 'buah', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Lembar', 'description' => 'lembar', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Helai', 'description' => 'helai', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Butir', 'description' => 'butir', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Gulung', 'description' => 'gulung', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Pcs', 'description' => 'pieces (satuan)', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Set', 'description' => 'set', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Gross', 'description' => 'gross (144 pcs)', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Karton', 'description' => 'karton', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Piring', 'description' => 'piring', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Kardus', 'description' => 'kardus', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Serbuk', 'description' => 'serbuk', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Cup', 'description' => 'cup', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Tablet', 'description' => 'tablet', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Kapsul', 'description' => 'kapsul', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Sisir', 'description' => 'sisir', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Tablet', 'description' => 'tablet', 'is_published' => true, 'user_id' => 1],
            ['name' => 'Satu Set', 'description' => 'satu set', 'is_published' => true, 'user_id' => 1],
        ];

        Defunit::insert($units);
    }
}
