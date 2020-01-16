<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employer;
use Faker\Generator as Faker;

$factory->define(Employer::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'category' => $faker->catchPhrase,
        'naics' => $faker->numberBetween(100000, 999999),
    ];
});
