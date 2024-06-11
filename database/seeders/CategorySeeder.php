<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Electronics'],
            ['category_name' => 'Clothing'],
            ['category_name' => 'Books'],
            ['category_name' => 'Accessories'],
            ['category_name' => 'Household'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
