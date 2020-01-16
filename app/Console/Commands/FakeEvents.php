<?php

namespace App\Console\Commands;

use App\Http\Controllers\WebhookCallNewRecords;
use App\Models\Event;
use Illuminate\Console\Command;

class FakeEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fake:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate fake events';

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
        $eventCount = 1; // How many events should we create?
        $records = factory(Event::class, $eventCount)->create();

        // Create list of new record IDs
        $ids = [];
        foreach ($records as $record) {
            $ids[] = $record->id;
        }

        // Notify Web Hooks of new record IDs
        $wh = new WebhookCallNewRecords();
        $wh->event($ids);
    }
}
