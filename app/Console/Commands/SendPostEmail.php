<?php

namespace App\Console\Commands;

use App\Mail\PostCreatedEmail;
use App\Models\EmailSendConfirmation;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPostEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-post-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notifications to subscribers of new posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $not_sent = EmailSendConfirmation::query()
            ->where('is_confirmed', false)
            ->get();

        foreach ($not_sent as $email_send_confirmation) {
            $post = $email_send_confirmation->post;
            $subscriber = $email_send_confirmation->subscription;

            Mail::to($subscriber->email)->send(new PostCreatedEmail($post));

            $email_send_confirmation->is_confirmed = true;
            $email_send_confirmation->save();
        }

        // Output a message to indicate that the command has finished running
        $this->info('Post notifications sent successfully.');
    }
}
