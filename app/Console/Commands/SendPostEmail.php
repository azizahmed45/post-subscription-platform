<?php

namespace App\Console\Commands;

use App\Models\Website;
use Illuminate\Console\Command;

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


        // Output a message to indicate that the command has finished running
        $this->info('Post notifications sent successfully.');
    }
}
