<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = ['Cuti Umum', 'Cuti Menyusui& Melahirkan', 'Cuti Masalah Kesehatan', 'Cuti Kedukaan'];
        $faker = Faker::create('id_ID');
            for($i = 0; $i<=3; $i++){
                DB::table('paid_leave_categories')->insert([
                    'name'=> $category[$i],
                    'desc' => $faker->paragraph(3),
                    'info' => $faker->paragraph()
                ]);
            }
    }
}
