<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\SampleData;
use App\Models\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {

    // Return random local employer
    $employer = SampleData::employer();
    return [
        'name' => $employer['name'],
        'street' => $employer['street'],
        'city' => $employer['city'],
        'state' => $employer['state'],
        'zipcode' => $employer['zipcode'],
        'lat' => $employer['lat'],
        'lng' => $employer['lng'],
    ];

    // Return random faker data
//    return [
//        'name' => $faker->company,
//        'street' => $faker->streetAddress,
//        'city' => $faker->city,
//        'state' => $faker->stateAbbr,
//        'zipcode' => $faker->numberBetween(10000,99999),
//    ];

});
