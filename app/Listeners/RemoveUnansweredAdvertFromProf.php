<?php

namespace App\Listeners;


use App\Events\CancelUnansweredBookingTriggered;

class RemoveUnansweredAdvertFromProf
{

    /**
     * Handle the event.
     *
     * @param  CancelUnansweredBookingTriggered $event
     * @return void
     */
    public function handle(CancelUnansweredBookingTriggered $event)
    {
        $event->booking->cancel();
    }

}