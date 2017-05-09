<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'Name' => $faker->name,
        'Email' => $faker->unique()->safeEmail,
        'Avatar' => $faker->imageUrl(320,240),
        'Age' => $faker->numberBetween(0,50),
        'Gender' => $faker->word,
        'PhoneNumber' => $faker->phoneNumber,
        'Address' => $faker->address,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\PV::class, function (Faker\Generator $faker) {
    return [
        'Temp' => $faker->randomFloat(2,8,30),
        'Humidity' => $faker->randomFloat(2,0,100),
        'Irr' => $faker->randomFloat(2,100,1000),
        'Vmp' => $faker->randomFloat(2,1,130),
        'Imp' => $faker->randomFloat(2,0,20),
        'Voltage' => $faker->randomFloat(2,1,130),
        'Current' => $faker->randomFloat(2,0,20),
        'Power' => $faker->randomFloat(2,0,300),
        'Status' => $faker->word,
        'Lat' => $faker->latitude,
        'Lng' => $faker->longitude,
        'Time' => $faker->dateTimeThisMonth,
    ];
});