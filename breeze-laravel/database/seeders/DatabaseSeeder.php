<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            ['name' => 'Shopping', 'description' => 'Buy everything you want'],
            ['name' => 'Shirts', 'description' => 'High quality + best price'],
            ['name' => 'Pets', 'description' => 'High level material for your lovely pets'],
            ['name' => 'Music', 'description' => 'Listen to best tracks for hours'],
            ['name' => 'Food', 'description' => 'The best in Ukraine'],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);

            for ($i = 0; $i < 10; $i++) {
                Product::create([
                    'name' => $category['name'] . ' Product ' . ($i + 1),
                    'description' => $category['name'],
                    'price' => rand(100, 1000),
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}