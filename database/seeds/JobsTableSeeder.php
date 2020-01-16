<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Job::class, 50)->create()->each(function ($job) {
            /** @var \App\Models\Job $job */

            $location_counts = [1, 1, 1, 1, 1, 1, 1, 1, 2, 3,];
            $i = array_rand($location_counts);
            $location_count = $location_counts[$i];
//            echo ($location_count);

            $job->locations()->saveMany(
                factory(App\Models\Location::class, $location_count)->make()
            );
        });
    }
}
