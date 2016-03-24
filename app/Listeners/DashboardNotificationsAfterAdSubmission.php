<?php

namespace App\Listeners;

use App\Events\AdvertPublished;

class DashboardNotificationsAfterAdSubmission
{

    /**
     * Handle the event.
     *
     * @param  AdvertPublished  $event
     * @return void
     */
    public function handle(AdvertPublished $event)
    {
        //Run through the ad and check if it can be made better
    }
}
