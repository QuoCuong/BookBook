<?php

use Book\Product;
use Faker\Generator as Faker;

$factory->define(Book\OrderDetail::class, function (Faker $faker) {
    $productIds = Product::pluck('id');

    return [
        'quantity'   => $faker->numberBetween(1, 10),
        'product_id' => $faker->randomElement($productIds),
    ];
});
