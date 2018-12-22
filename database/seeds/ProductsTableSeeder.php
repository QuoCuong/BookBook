<?php

use Book\Image;
use Book\Product;
use Book\ProductDetail;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 20)->create()->each(function ($product) {
            $product->productDetail()->save(factory(ProductDetail::class)->make());
            $product->images()->save(factory(Image::class)->make());
            $product->images()->save(factory(Image::class)->make());
        });
    }
}
