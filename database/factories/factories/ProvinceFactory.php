<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Province::class, function (Faker $faker,$params) {
    return [
        'name' => $faker->city,
        'country_id' => $params['country_id'],
    ];
});
