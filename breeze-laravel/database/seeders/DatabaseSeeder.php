<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // Disable foreign key checks
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // // Truncate tables
        // DB::table('products')->truncate();
        // DB::table('categories')->truncate();

        // // Re-enable foreign key checks
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category::factory()->create([
        //     'name' => 'Category 1',
        //     'description' => 'Description 1',
        // ]);

        // Category::factory()->create([
        //     'name' => 'Category 2',
        //     'description' => 'Description 2',
        // ]);



        Category::factory(10)->count(5)->hasProducts(10)->create();
        Product::factory(10)->create();
    }
}