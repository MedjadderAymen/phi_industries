<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->streetAddress,
    ];
});
