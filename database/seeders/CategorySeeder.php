<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Home Care',
            'Lifestyle',
            'Wellness',
            'Kitchen',
            'Fitness',
            'Beauty',
            'Gardening',
            'Electronics',
            'Kids',
            'Office',
        ];

        foreach ($categories as $index => $name) {
            Category::create([
                'name' => $name,
                'order' => $index + 1,
                'status' => 1,
            ]);
        }
    }
}
