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
        $categories = factory(Category::class, 3)->create();

        $categories->each(function($category) {
            $products = factory(Product::class, 3)->make();
            $category->products()->saveMany($products);

            $products->each(function ($product) {
                $images = factory(Image::class, 3)->make();
                $product->images()->saveMany($images);
            });
        });

    }
}
