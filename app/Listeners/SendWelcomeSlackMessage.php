<?php

namespace App\Listeners;

use App\Events\NewContactAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeSlackMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewContactAdded  $event
     * @return void
     */
    public function handle(NewContactAdded $event)
    {
        //
    }
}
