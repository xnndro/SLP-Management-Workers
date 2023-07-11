<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TaskCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $category = ['Pembersihan','Pemeliharaan'];
        for($i = 0; $i <= 1; $i++){
            for($j = 0; $j <= 6; $j++){
                DB::table('task_category')->insert([
                    'panduan_id' => $j+1,
                    'task_category_name' => $category[$i],
                ]);
            }
        }
    }
}
