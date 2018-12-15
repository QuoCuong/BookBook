<?php

use Faker\Generator as Faker;

$factory->define(Book\Image::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'path' => $faker->image('public/storage', 270, 340, 'technics'),
    ];
});
