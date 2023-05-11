<?php

namespace App\Jobs;

use App\Mail\PostCreatedEmail;
use App\Models\EmailSendConfirmation;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscriber;
    public $post;

    /**
     * Create a new job instance.
     */
    public function __construct(Subscription $subscriber, Post $post)
    {
        $this->subscriber = $subscriber;
        $this->post = $post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->subscriber->email)->send(new PostCreatedEmail($this->post));

        EmailSendConfirmation::query()
            ->where('subscription_id', $this->subscriber->id)
            ->where('post_id', $this->post->id)
            ->update(['is_confirmed' => true]);
    }
}
