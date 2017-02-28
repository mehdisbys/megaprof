<?php

namespace App\Providers;

use App\Events\AdvertPublished;
use App\Events\AdvertWasRejectedByAdmin;
use App\Events\BookingRequestReply;
use App\Events\BookingRequestSent;
use App\Events\IdDocumentSent;
use App\Events\ProfCommentedOnStudent;
use App\Events\StudentCommentedOnProf;
use App\Listeners\DashboardNotificationsAfterAdSubmission;
use App\Listeners\NotifyAdminIdDocumentSent;
use App\Listeners\NotifyBookingReply;
use App\Listeners\NotifyBookingRequest;
use App\Listeners\NotifyProfAdvertWasRejected;
use App\Listeners\NotifyProfOfPostedComment;
use App\Listeners\NotifyStudentOfPostedComment;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        BookingRequestSent::class     =>
            [
                NotifyBookingRequest::class,
            ],
        BookingRequestReply::class    =>
            [
                NotifyBookingReply::class,
            ],
        AdvertPublished::class        =>
            [
                DashboardNotificationsAfterAdSubmission::class,
            ],
        ProfCommentedOnStudent::class =>
            [
                NotifyStudentOfPostedComment::class,
            ],
        StudentCommentedOnProf::class =>
            [
                NotifyProfOfPostedComment::class,
            ],
        IdDocumentSent::class         =>
            [
                NotifyAdminIdDocumentSent::class,
            ],

        AdvertWasRejectedByAdmin::class =>
            [
                NotifyProfAdvertWasRejected::class,
            ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
    }
}
