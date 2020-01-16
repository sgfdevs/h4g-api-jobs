<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use App\Models\Location;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {

    $date = $faker->dateTimeBetween('-90 days', '+90 days');
    $event_id = $faker->numberBetween(10000, 19999);

    return [
        //
        'date_begin' => $date,
        'date_end' => $date,
        'title' => $faker->company . ' Hiring Event',
        'location_id' => Location::all()->random()->id,
        'event_id' => $event_id,
        'description' => $faker->text(200),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->companyEmail(),
        'cost' => $faker->numberBetween(0, 10) * 10,
        'url' => 'https://hack4goodsgf.com/projects/workforce/?event=' . $event_id,
        'url_image' => 'https://hack4goodsgf.com/projects/workforce/?event_image=' . $event_id,
    ];
});
