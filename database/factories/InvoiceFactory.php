<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'client_id'=> \App\Client::all()->first()->id,
        'user_id'=> \App\User::all()->first()->id,
        'to'=> $faker->name,
        'invoice_id'=> uniqid(),
        'phone_number'=> $faker->phoneNumber,
        'email'=> $faker->email,
        'total'=> $faker->randomNumber(5),
    ];
});
