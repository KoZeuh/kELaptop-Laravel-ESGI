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
        DB::table('categories')->insert(['name' => 'Ordinateurs']);
        DB::table('categories')->insert(['name' => 'PC Gamer', 'parent_id' => 1]);
        DB::table('categories')->insert(['name' => 'PC de bureau', 'parent_id' => 1]);
        DB::table('categories')->insert(['name' => 'PC Portable', 'parent_id' => 1]);
        DB::table('categories')->insert(['name' => 'PC Portable Gamer', 'parent_id' => 1]);
        DB::table('categories')->insert(['name' => 'MacBook', 'parent_id' => 1]);
        DB::table('categories')->insert(['name' => 'Téléphonie']);
        DB::table('categories')->insert(['name' => 'Smartphones', 'parent_id' => 7]);
        DB::table('categories')->insert(['name' => 'Tablettes']);


    }
}
