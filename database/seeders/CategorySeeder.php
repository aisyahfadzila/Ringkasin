<?php

namespace Database\Seeders;

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
        DB::table('categories')->insert([
            ['name' => 'Romansa'],
            ['name' => 'Karir'],
            ['name' => 'Fiksi'],
            ['name' => 'Tata Boga'],
            ['name' => 'Pengembangan Diri'],
            ['name' => 'Edukasi'],
            ['name' => 'Pemasaran'],
            ['name' => 'Gaya Hidup'],
            ['name' => 'Biografi'],
            ['name' => 'Hiburan'],
            ['name' => 'Kepemimpinan'],
            ['name' => 'Sejarah'],
            ['name' => 'Bisnis'],
            ['name' => 'Psikologi'],
            ['name' => 'Kesehatan'],
            ['name' => 'Politik'],
            ['name' => 'Teknologi'],
            ['name' => 'Budaya'],
            ['name' => 'Sains'],
            ['name' => 'Spiritual'],
        ]);
    }
}
