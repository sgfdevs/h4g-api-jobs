<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employer;
use App\Models\Job;
use App\Models\Location;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {

    $req_educations = ['high_school', 'high_school', 'high_school',
        'high_school', 'high_school', 'high_school',
        'associate', 'bachelor', 'master', 'doctorate'];
    $i = array_rand($req_educations);
    $req_education = $req_educations[$i];

    $job_types = ['full_time', 'full_time', 'full_time', 'full_time', 'full_time',
        'part_time', 'internship', 'casual', 'temporary', 'contractor'];
    $i = array_rand($job_types);
    $job_type = $job_types[$i];

    $job_id = $faker->numberBetween(100000, 999999);

    return [
        'date_posted' => $faker->dateTimeBetween('-30 days', '-1 days'),
        'date_updated' => now(),
        'date_expires' => $faker->dateTimeBetween('-30 days', '+30 days'),
        'employer_id' => Employer::all()->random()->id,
//        'location_id' => Location::all()->random()->id,
        'title' => $faker->jobTitle,
        'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. <b>Lorem ipsum dolor sit amet, consectetur adipiscing elit</b>. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. <b>Lorem ipsum dolor sit amet, consectetur adipiscing elit</b>. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p><p>Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit</i>. Fusce ac turpis quis ligula lacinia aliquet. </p><p>Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. <b>Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa</b>. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien. Proin quam. Etiam ultrices. </p>',
        // full_time, part_time, internship, casual, temporary, contractor
        'job_type' => $job_type,
        'job_id' => $job_id,
        'pay_rate' => '$' . $faker->numberBetween(10, 100) . ',000 per year',
        'req_education' => $req_education,
        'data_source' => 'Hack 4 Good Springfield',
        'data_site' => 'hack4goodsgf.com',
        'url' => 'https://hack4goodsgf.com/projects/workforce/?job=' . $job_id,
        'fake' => true,
    ];
});
