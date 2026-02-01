<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Category;
use App\Models\Backend\Subcategory;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {
                Subcategory::create([
                    'name' => $category->name . ' Sub ' . $i,
                    'category_id' => $category->id,
                    'order' => $i,
                    'status' => 1,
                ]);
            }
        }
    }
}
