<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DeepUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Teknisi A', 'email' => 'teknisia@stavvy.com', 'password' => Hash::make('teknisia'), 'user_nik' => '123456789', 'user_join_date' => '2021-01-01', 'user_role' => 'user'],
            ['name' => 'House Keeper A', 'email' => 'housekeepera@stavvy.com', 'password' => Hash::make('housekeepera'), 'user_nik' => '123456789', 'user_join_date' => '2021-01-01', 'user_role' => 'user'],
        ]);
    }
}
