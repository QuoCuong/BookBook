<?php

use Faker\Generator as Faker;

$factory->define(Book\ProductDetail::class, function (Faker $faker) {
    return [
        'author'         => $faker->name,
        'publisher'      => $faker->name,
        'publish_year'   => $faker->year(),
        'weight'         => $faker->numberBetween(100, 500),
        'size'           => $faker->randomFloat(2, 10, 30) . ' x ' . $faker->randomFloat(2, 10, 30),
        'number_of_page' => $faker->numberBetween(100, 2000),
        'cover'          => $faker->randomElement(['Cứng', 'Mềm']),
    ];
});
