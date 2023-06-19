<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeepPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('place')->insert([
            ['place_name' => 'Tower A - Kamar Mandi Pria Lt.8'],
            ['place_name' => 'Tower A - Library Lt.8'],
            ['place_name' => 'Tower A - Ruang 801'],
            ['place_name' => 'Tower A - Ruang 802']
        ]);
    }
}
