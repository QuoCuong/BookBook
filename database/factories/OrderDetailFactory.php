<?php

use Book\Product;
use Faker\Generator as Faker;

$factory->define(Book\OrderDetail::class, function (Faker $faker) {
    $productIds = Product::pluck('id');
    do {
        $product_id   = $faker->randomElement($productIds);
        $max_quantity = Product::where('id', $product_id)->first()->quantity / 4;
    } while ($max_quantity == 0);

    return [
        'quantity'   => $faker->numberBetween(1, $max_quantity),
        'product_id' => $product_id,
    ];
});
