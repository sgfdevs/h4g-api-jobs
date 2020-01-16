<?php

namespace App\Console\Commands;

use App\Http\Controllers\WebhookCallNewRecords;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Console\Command;

class FakeJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fake:jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate fake jobs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Spatie\WebhookServer\Exceptions\CouldNotCallWebhook
     */
    public function handle()
    {
        // How many jobs should we create? (limit 1 per call)
        $jobCount = 1;

        $records = factory(Job::class, $jobCount)->create()->each(function ($job) {
            /** @var \App\Models\Job $job */

            // How many locations should each job have? (80% have 1, 10% 2, 10% 3)
            $location_counts = [1, 1, 1, 1, 1, 1, 1, 1, 2, 3,];
            $i = array_rand($location_counts);
            $location_count = $location_counts[$i];

            $job->locations()->saveMany(
                factory(Location::class, $location_count)->make()
            );
        });

        // Create list of new record IDs
        $ids = [];
        foreach ($records as $record) {
            $ids[] = $record->id;
        }

        // Notify Web Hooks of new record IDs
        $wh = new WebhookCallNewRecords();
        $wh->job($ids);
    }
}
