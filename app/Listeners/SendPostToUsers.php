<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendEmailJob;
use App\Mail\PostCreatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendPostToUsers
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event)
    {
        $post = $event->post;
        $website = $post->website;

        $subscribers = $website->subscribers;

        foreach ($subscribers as $subscriber) {
            SendEmailJob::dispatch($subscriber, $post);
        }
    }
}
