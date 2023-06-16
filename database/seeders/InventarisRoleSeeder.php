<?php

namespace Database\Seeders;

use App\Models\InventarisRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InventarisRole::create([
            'inventory_roles_name' => 'Housekeeping'
        ]);
        InventarisRole::create([
            'inventory_roles_name' => 'Facade Cleaning'
        ]);
        InventarisRole::create([
            'inventory_roles_name' => 'Technician'
        ]);
        InventarisRole::create([
            'inventory_roles_name' => 'Gardener'
        ]);
    }
}
