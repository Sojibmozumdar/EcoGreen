<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Product;
use App\Models\Backend\Upload;
use App\Models\Backend\Subcategory;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $subCategories = Subcategory::with('category')->get();

        foreach ($subCategories as $subCategory) {

            for ($i = 1; $i <= 3; $i++) {

                $product = Product::create([
                    'name' => $faker->words(3, true),
                    'price' => $faker->numberBetween(500, 5000),
                    'quantity' => $faker->numberBetween(0, 100),
                    'discount' => $faker->numberBetween(0, 500),
                    'short_description' => $faker->sentence(12),
                    'description' => $faker->paragraph(4),
                    'product_details' => $faker->paragraph(6),
                    'delivery_policy' => 'Delivery within 3–5 working days',
                    'return_policy' => '7 days return policy',
                    'status' => 1,
                    'category_id' => $subCategory->category_id,
                    'sub_category_id' => $subCategory->id,
                ]);

                // 4 images per product
                for ($j = 1; $j <= 4; $j++) {
                    Upload::create([
                        'product_id' => $product->id,
                        'path' => 'products/product-image-' . rand(1, 11) . '.jpg',
                    ]);
                }
            }
        }
    }
}
