<?php

namespace App\Listeners;

use App\Events\AdvertPublished;
use App\Models\Notification;

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
        $editLink = '/modifier-annonce-';
        $advertId = $event->advert->id;

        //Run through the ad and check if it can be made better
        if($event->advert->can_webcam == NULL)
        {
            Notification::createAdvertNotification(
                'webcam',
                config('notification.webcam'),
                $editLink."5/$advertId",
                $advertId);
        }
    }
}
