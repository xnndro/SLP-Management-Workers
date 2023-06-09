<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use Illuminate\Database\Seeder;

class InventarisSeeder extends Seeder
{
    public function run(): void
    {
        Inventaris::create([
            'inventaris_name' => 'Tempat Sampah Besar',
            'inventaris_image' => '../../assets/images/tempat-sampah-besar.jpg',
            'inventaris_description' => 'Tempat sampah untuk menampung sampah dari setiap lantai',
            'inventaris_total' => 50,
            'role_id' => 2,
        ]);
        Inventaris::create([
            'inventaris_name' => 'Vaccum Cleaner',
            'inventaris_image' => '../../assets/images/vaccumcleaner.jpg',
            'inventaris_description' => 'Vaccum cleaner penyedot debu untuk membersihkan ruangan beralas karpet seperti ruang kelas',
            'inventaris_total' => 25,
            'role_id' => 2,
        ]);
        Inventaris::create([
            'inventaris_name' => 'Tangga',
            'inventaris_image' => '../../assets/images/tangga.jpg',
            'inventaris_description' => 'Tangga yang digunakan untuk pemeriksaan dan perbaikan lampu atau kerusakan yang terjadi di bagian atas ruangan',
            'inventaris_total' => 35,
            'role_id' => 5,
        ]);
        Inventaris::create([
            'inventaris_name' => 'Sapu ruangan',
            'inventaris_image' => '../../assets/images/sapuruangan.png',
            'inventaris_description' => 'Sapu khusus untuk membersihkan ruangan beralas karpet di setiap lantai',
            'inventaris_total' => 75,
            'role_id' => 2,
        ]);
    }
}
