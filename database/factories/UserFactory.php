<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'company' => "Phi Industries",
        'email' => "phi.industries@gmail.com",
        'email_verified_at' => now(),
        'description' => "Fabrication des compléments alimentaires",
        'last_time_in' => now(),
        'password' => bcrypt("password"), // password
        'remember_token' => Str::random(10),
        'address' => "Cité benabdelmalek ramdane 245 Constantine",
        'rc' => "25/00-0071757B17",
        'nif' => "001725007175769",
        'ai' => "25016363111",
        'nis' => "001725010025169",
        'phone_number' => $faker->phoneNumber,
    ];
});
