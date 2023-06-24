<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['role_name' => 'Supervisor'],
            ['role_name' => 'Housekeeping'],
            ['role_name' => 'Facade Cleaning'],
            ['role_name' => 'Gardener'],
            ['role_name' => 'Technician'],
        ]);
    }
}
