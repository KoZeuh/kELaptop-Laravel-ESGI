<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Brand;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'iPhone 12',
            'brand_id' => Brand::where('name', 'Apple')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 909
        ]);

        DB::table('products')->insert([
            'name' => 'Galaxy S21',
            'brand_id' => Brand::where('name', 'Samsung')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 849
        ]);

        DB::table('products')->insert([
            'name' => 'Mate 40 Pro',
            'brand_id' => Brand::where('name', 'Huawei')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 899
        ]);

        DB::table('products')->insert([
            'name' => 'Mi 11',
            'brand_id' => Brand::where('name', 'Xiaomi')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 749
        ]);

        DB::table('products')->insert([
            'name' => 'Find X3 Pro',
            'brand_id' => Brand::where('name', 'Oppo')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 1149
        ]);

        DB::table('products')->insert([
            'name' => 'X60 Pro',
            'brand_id' => Brand::where('name', 'Vivo')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 799
        ]);

        DB::table('products')->insert([
            'name' => 'Realme GT',
            'brand_id' => Brand::where('name', 'Realme')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 599
        ]);

        DB::table('products')->insert([
            'name' => 'OnePlus 9 Pro',
            'brand_id' => Brand::where('name', 'OnePlus')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 969
        ]);

        DB::table('products')->insert([
            'name' => 'Pixel 5',
            'brand_id' => Brand::where('name', 'Google')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 699
        ]);

        DB::table('products')->insert([
            'name' => 'Xperia 1 III',
            'brand_id' => Brand::where('name', 'Sony')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 1299
        ]);

        DB::table('products')->insert([
            'name' => 'LG Wing',
            'brand_id' => Brand::where('name', 'LG')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 999
        ]);

        DB::table('products')->insert([
            'name' => 'Moto G100',
            'brand_id' => Brand::where('name', 'Motorola')->first()->id,
            'category_id' => Category::where('name', 'Smartphones')->first()->id,
            'price' => 499
        ]);
    }
}
