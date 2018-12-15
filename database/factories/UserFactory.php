<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(Book\User::class, function (Faker $faker) {
    return [
        'email'             => $faker->unique()->safeEmail,
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'first_name'        => $faker->firstName(),
        'last_name'         => $faker->lastName(),
        'birthday'          => $faker->date('Y-m-d', 'now'),
        'sex'               => $faker->randomElement(['male', 'female']),
        'role_id'           => 2,
        'email_verified_at' => now(),
        'remember_token'    => str_random(10),
    ];
});
