<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PanduanSeeder::class,
            InventarisSeeder::class,
            PlaceSeeder::class,
            CategorySeeder::class,
            TaskCategory::class,
        ]);

    }
}
