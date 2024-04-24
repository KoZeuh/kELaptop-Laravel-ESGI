<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert(['name' => 'Apple']);
        DB::table('brands')->insert(['name' => 'Samsung']);
        DB::table('brands')->insert(['name' => 'Huawei']);
        DB::table('brands')->insert(['name' => 'Xiaomi']);
        DB::table('brands')->insert(['name' => 'Oppo']);
        DB::table('brands')->insert(['name' => 'Vivo']);
        DB::table('brands')->insert(['name' => 'Realme']);
        DB::table('brands')->insert(['name' => 'OnePlus']);
        DB::table('brands')->insert(['name' => 'Google']);
        DB::table('brands')->insert(['name' => 'Sony']);
        DB::table('brands')->insert(['name' => 'LG']);
        DB::table('brands')->insert(['name' => 'Motorola']);
        DB::table('brands')->insert(['name' => 'Nokia']);
        DB::table('brands')->insert(['name' => 'Asus']);
        DB::table('brands')->insert(['name' => 'Acer']);
        DB::table('brands')->insert(['name' => 'HP']);
        DB::table('brands')->insert(['name' => 'Dell']);
        DB::table('brands')->insert(['name' => 'Lenovo']);
        DB::table('brands')->insert(['name' => 'MSI']);
        DB::table('brands')->insert(['name' => 'Alienware']);
        DB::table('brands')->insert(['name' => 'Razer']);
        DB::table('brands')->insert(['name' => 'Corsair']);
        DB::table('brands')->insert(['name' => 'Logitech']);
        DB::table('brands')->insert(['name' => 'SteelSeries']);
        DB::table('brands')->insert(['name' => 'HyperX']);
        DB::table('brands')->insert(['name' => 'Kingston']);
        DB::table('brands')->insert(['name' => 'Western Digital']);
        DB::table('brands')->insert(['name' => 'Seagate']);
        DB::table('brands')->insert(['name' => 'SanDisk']);
        DB::table('brands')->insert(['name' => 'Crucial']);
    }
}
