<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage as Image;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // factory(Category::class, 5)->create();
        // factory(Product::class, 50)->create();
        // factory(Image::class, 150)->create();

        $categories = factory(Category::class, 5)->create();

        $categories->each(function($category) {
            $products = factory(Product::class, 5)->make();
            $category->products()->saveMany($products);

            $products->each(function ($product) {
                $images = factory(Image::class, 3)->make();
                $product->images()->saveMany($images);
            });
        });

    }
}
