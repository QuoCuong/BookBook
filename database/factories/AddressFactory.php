<?php

use Book\City;
use Book\User;
use Faker\Generator as Faker;

$factory->define(Book\Address::class, function (Faker $faker) {
    $userIds     = User::pluck('id');
    $cityIds     = City::pluck('id');
    $city_id     = $faker->randomElement($cityIds);
    $district_id = $faker->randomElement(City::where('id', $city_id)->first()->districts->pluck('id'));

    return [
        'first_name'  => $faker->firstName(),
        'last_name'   => $faker->lastName(),
        'phone'       => '0' . $faker->randomNumber(9, true),
        'address'     => $faker->address,
        'user_id'     => $faker->randomElement($userIds),
        'city_id'     => $city_id,
        'district_id' => $district_id,
    ];
});
