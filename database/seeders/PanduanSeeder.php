<?php

namespace Database\Seeders;

use App\Models\Panduan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PanduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Panduan::create([
            'panduan_title' => 'Membersihkan ruang kelas',
            'panduan_content' => 'Seluruh karpet yang ada wajib dibersihkan menggunakan vaccum cleaner, Menyapu karpet menggunakan sapu ruangan dan vaccum cleaner. Untuk karpet yang basah gunakan pengering dengan daya sedang. Untuk General Cleaning, karpet harus diangkat sebelum di pel menggunakan pel ruangan. Pastikan supaya meninggalkan ruangan dalam keadaan bersih.',
            'panduan_image' => '../../assets/images/list-inventaris-icon.png',
            'inventaris_role_id' => 1
        ]);
        Panduan::create([
            'panduan_title' => 'Membersihkan kaca tower A',
            'panduan_content' => 'Setiap kaca wajib dibersihkan satu per satu. Kaca yang ada harus diberi sabun pembersih, lap, dan kemudian dikeringkan. Pastikan kaca tidak memiliki noda.',
            'panduan_image' => '../../assets/images/list-inventaris-icon.png',
            'inventaris_role_id' => 2
        ]);
    }
}
