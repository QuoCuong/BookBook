<?php

use Book\Subcategory;
use Faker\Generator as Faker;

$factory->define(Book\Product::class, function (Faker $faker) {
    $subcategoryIds = Subcategory::where('category_id', null)->pluck('id');

    return [
        'name'           => $faker->name,
        'description'    => $faker->paragraph(6),
        'quantity'       => $faker->numberBetween(20, 200),
        'price'          => $faker->numberBetween(10000, 9999999),
        'subcategory_id' => $faker->randomElement($subcategoryIds),
    ];
});
