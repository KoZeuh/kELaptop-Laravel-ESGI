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
        $smartphoneCategoryId = Category::where('name', 'Smartphones')->first()->id;

        $appleBrandId = Brand::where('name', 'Apple')->first()->id;

        for ($i = 8; $i < 16; $i++) {
            if ($i === 9) {
                continue;
            }

            $productId = DB::table('products')->insertGetId([
                'name' => 'iPhone ' . $i,
                'brand_id' => $appleBrandId,
                'category_id' => $smartphoneCategoryId,
                'price' => random_int(699, 1499),
                'details' => json_encode([
                    'display' => 'Super Retina XDR',
                    'processor' => 'A14 Bionic',
                    'camera' => 'Triple 12 MP',
                    'battery' => '3687 mAh'
                ])
            ]);

            DB::table('product_images')->where('product_id', $productId)->where('isPrimary', true)->update(['path' => 'iphone-' . $i . '.jpg']);
        }

        $samsungBrandId = Brand::where('name', 'Samsung')->first()->id;
        
        for ($i = 20; $i < 22; $i++) {
            $productId = DB::table('products')->insertGetId([
                'name' => 'Galaxy S' . $i,
                'brand_id' => $samsungBrandId,
                'category_id' => $smartphoneCategoryId,
                'price' => random_int(699, 1499),
                'details' => json_encode([
                    'display' => 'Dynamic AMOLED 2X',
                    'processor' => 'Exynos 2100',
                    'camera' => 'Quad 108 MP',
                    'battery' => '5000 mAh'
                ])
            ]);

            DB::table('product_images')->where('product_id', $productId)->where('isPrimary', true)->update(['path' => 'galaxy-s' . $i . '.jpg']);
        }
    }
}
