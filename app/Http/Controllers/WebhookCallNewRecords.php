<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventCollection;
use App\Http\Resources\JobCollection;
use App\Models\Event;
use App\Models\Job;
use App\User;
use Spatie\WebhookServer\WebhookCall;

class WebhookCallNewRecords extends Controller
{
    /**
     * Queue Web Hook calls for given Event record IDs
     *
     * @param array $ids List of Event IDs (Integers)
     * @return void
     * @throws \Spatie\WebhookServer\Exceptions\CouldNotCallWebhook
     */
    public function event($ids): void
    {
        // Generate job record data based on the provided job IDs
        $events = new EventCollection(Event::find($ids));
        $payload = [
            'events' => $events,
        ];
        $this->queue($payload);
    }

    /**
     * Queue Web Hook calls for given Job record IDs
     *
     * @param array $ids List of Job IDs (Integers)
     * @return void
     * @throws \Spatie\WebhookServer\Exceptions\CouldNotCallWebhook
     */
    public function job($ids): void
    {
        // Generate job record data based on the provided job IDs
        $jobs = new JobCollection(Job::find($ids));
        $payload = [
            'jobs' => $jobs,
        ];
        $this->queue($payload);
    }

    /**
     * Queue Web Hook calls for given Job record IDs
     *
     * @param $payload
     * @return void
     * @throws \Spatie\WebhookServer\Exceptions\CouldNotCallWebhook
     */
    public function queue($payload): void
    {
        // Query list of users with webhooks we need to call
        $users = User::whereNotNull('webhook_url')->get();

        // Process each webhook and update called time
        foreach ($users as $user) {
            WebhookCall::create()
                ->url($user->webhook_url)
                ->payload($payload)
                ->useSecret(config('webhook-server.secret'))
                ->dispatch();
            $user->webhook_called_at = now();
            $user->save();
        }

    }
}
