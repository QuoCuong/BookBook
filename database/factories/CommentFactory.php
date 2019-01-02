<?php

use Book\Product;
use Book\User;
use Faker\Generator as Faker;

$factory->define(Book\Comment::class, function (Faker $faker) {
    $productIds = Product::pluck('id');
    $userIds    = User::where('role_id', 2)->pluck('id');

    return [
        'rating_quality' => $faker->numberBetween(1, 5),
        'rating_price'   => $faker->numberBetween(1, 5),
        'rating_value'   => $faker->numberBetween(1, 5),
        'nickname'       => $faker->firstName,
        'title'          => $faker->text(60),
        'content'        => $faker->realText(),
        'product_id'     => $faker->randomElement($productIds),
        'user_id'        => $faker->randomElement($userIds),
    ];
});
