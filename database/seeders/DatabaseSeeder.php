<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // // Create categories
        \App\Models\Category::factory(5)->create();


        // Create sub-categories
        \App\Models\Category::factory(5)->create([
            'parent_id' => Category::inRandomOrder()->first()->id
        ]);

        // Create products and append categories
        \App\Models\Product::factory(1)->create()->each(function ($product) {

            $product->categories()->attach(Category::inRandomOrder()->take(3)->get()->pluck('id'));
        });
    }
}
