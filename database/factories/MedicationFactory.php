<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medication;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Medication::class, function (Faker $faker) {
    return [

        'name' => $faker->company,
        'quantity' => $faker->randomDigit*10,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user_id' => \App\User::all()->first()->id,
        'modified_by' => \App\User::all()->first()->id,

    ];
});
