<?php

namespace App\Providers;

use App\Events\AdvertPublished;
use App\Events\AdvertWasAcceptedByAdmin;
use App\Events\AdvertWasRejectedByAdmin;
use App\Events\BookingRequestReply;
use App\Events\BookingRequestSent;
use App\Events\IdDocumentSent;
use App\Events\ProfCommentedOnStudent;
use App\Events\ProfCreatedAdvert;
use App\Events\StudentCommentedOnProf;
use App\Events\UserCreatedAccountAndFirstLogin;
use App\Events\UserDidASearch;
use App\Listeners\DashboardNotificationsAfterAdSubmission;
use App\Listeners\FirstLoginListener;
use App\Listeners\NotifiyProfAdvertWasApproved;
use App\Listeners\NotifyAdminAdvertCreated;
use App\Listeners\NotifyAdminIdDocumentSent;
use App\Listeners\NotifyBookingReply;
use App\Listeners\NotifyBookingRequest;
use App\Listeners\NotifyProfAdvertWasRejected;
use App\Listeners\NotifyProfOfPostedComment;
use App\Listeners\NotifyStudentOfPostedComment;
use App\Listeners\SendReminderToUser;
use App\Listeners\SuccessAdvertCreatedNotification;
use App\Listeners\ZeroSearchResultsNotifier;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Reminders\Events\ReminderEmail;

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

        AdvertWasAcceptedByAdmin::class =>
            [
                NotifiyProfAdvertWasApproved::class,
                DashboardNotificationsAfterAdSubmission::class
            ],

        UserCreatedAccountAndFirstLogin::class =>
            [
                FirstLoginListener::class,
            ],
        ProfCreatedAdvert::class =>
            [
                NotifyAdminAdvertCreated::class,
                SuccessAdvertCreatedNotification::class
            ],
        ReminderEmail::class =>
            [
                SendReminderToUser::class,
            ],
        UserDidASearch::class =>
        [
            ZeroSearchResultsNotifier::class
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
