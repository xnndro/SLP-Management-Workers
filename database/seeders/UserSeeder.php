<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $faker = Faker::create('id_ID');
            for($i = 1; $i<=5; $i++){
                DB::table('users')->insert([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => "12345", 
                    'user_nik' => "292929192192",
                    'user_join_date' => '2022-12-20',
                    'user_role' => "Fascade Cleaner"
                ]);
            }
    }
}
