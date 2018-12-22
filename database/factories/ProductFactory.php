<?php

use Faker\Generator as Faker;

$factory->define(Book\Product::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->paragraph(6),
        'quantity'    => $faker->numberBetween(20, 200),
        'price'       => $faker->numberBetween(10000, 9999999),
        'category_id' => $faker->numberBetween(11, 62),
    ];
});
