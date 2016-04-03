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

        // Webcam
        if($event->advert->can_webcam == NULL)
        {
            Notification::createAdvertNotification(
                'webcam',
                config('notifications.webcam'),
                $editLink."5/$advertId",
                $advertId,
                \Auth::id());
        }

        // TODO Presentation video
        if($event->advert->marketing_video == NULL)
        {
            Notification::createAdvertNotification(
                'marketing-video',
                config('notifications.marketing-video'),
                "",
                $advertId,
                \Auth::id());
        }

        // TODO Social networks sharing
            Notification::createAdvertNotification(
                'social-networks',
                config('notifications.social-networks'),
                "",
                $advertId,
                \Auth::id()
            );

        // TODO Check degree has been sent to us

        Notification::createAdvertNotification(
            'degree-check',
            config('notifications.degree-check'),
            "",
            $advertId,
            \Auth::id()
        );

        // TODO Small groups courses
        Notification::createAdvertNotification(
            'group-course',
            config('notifications.group-course'),
            "",
            $advertId,
            \Auth::id()
        );

        // TODO Try professional offer for teachers

        Notification::createAdvertNotification(
            'pro-offer',
            config('notifications.pro-offer'),
            "",
            $advertId,
            \Auth::id()
        );

    }
}