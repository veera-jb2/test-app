<?php

namespace App\Listeners;

use App\Events\NotificationHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationHistory
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
     * @param  \App\Events\NotificationHistory  $event
     * @return void
     */
    public function handle(NotificationHistory $event)
    {
        //
    }
}
