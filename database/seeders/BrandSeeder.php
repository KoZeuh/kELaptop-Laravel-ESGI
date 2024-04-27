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
        DB::table('brands')->insert(['name' => 'Asus']);
        DB::table('brands')->insert(['name' => 'Acer']);
        DB::table('brands')->insert(['name' => 'HP']);
        DB::table('brands')->insert(['name' => 'Dell']);
        DB::table('brands')->insert(['name' => 'Lenovo']);
        DB::table('brands')->insert(['name' => 'MSI']);
        DB::table('brands')->insert(['name' => 'Alienware']);
    }
}
