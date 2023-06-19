<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Inventaris;
use App\Models\InventarisRole;
use App\Models\Panduan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            PanduanSeeder::class,
            InventarisSeeder::class,
            InventarisRoleSeeder::class,
        ]);

    }
}
