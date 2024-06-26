<?php

namespace App\Providers;

use App\Events\AdvertWasAcceptedByAdmin;
use App\Events\AdvertWasRejectedByAdmin;
use App\Events\BookingRequestReply;
use App\Events\BookingRequestSent;
use App\Events\CancelUnansweredBookingTriggered;
use App\Events\IdDocumentSent;
use App\Events\ProfCommentedOnStudent;
use App\Events\ProfCreatedAdvert;
use App\Events\StudentCommentedOnProf;
use App\Events\UserCreatedAccountAndFirstLogin;
use App\Events\UserDidASearch;
use App\Listeners\DashboardNotificationsAfterAdSubmission;
use App\Listeners\FirstLoginListener;
use App\Listeners\InstantMatchAdvertsRegisteredUserInterests;
use App\Listeners\NotifiyProfAdvertWasApproved;
use App\Listeners\NotifyAdminAdvertCreated;
use App\Listeners\NotifyAdminBookingRequestSent;
use App\Listeners\NotifyAdminIdDocumentSent;
use App\Listeners\NotifyBookingReply;
use App\Listeners\NotifyBookingRequest;
use App\Listeners\NotifyProfAdvertWasRejected;
use App\Listeners\NotifyProfAndStudentUnansweredBookingCancelled;
use App\Listeners\NotifyProfOfPostedComment;
use App\Listeners\NotifyStudentOfPostedComment;
use App\Listeners\RemoveUnansweredAdvertFromProf;
use App\Listeners\SendReminderToUser;
use App\Listeners\SuccessAdvertCreatedNotification;
use App\Listeners\ZeroSearchResultsNotifier;
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
        BookingRequestSent::class =>
            [
                NotifyBookingRequest::class,
                NotifyAdminBookingRequestSent::class
            ],
        BookingRequestReply::class =>
            [
                NotifyBookingReply::class,
            ],
        ProfCommentedOnStudent::class =>
            [
                NotifyStudentOfPostedComment::class,
            ],
        StudentCommentedOnProf::class =>
            [
                NotifyProfOfPostedComment::class,
            ],
        IdDocumentSent::class =>
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
                DashboardNotificationsAfterAdSubmission::class,
                InstantMatchAdvertsRegisteredUserInterests::class
            ],

        UserCreatedAccountAndFirstLogin::class =>
            [
                FirstLoginListener::class,
            ],
        ProfCreatedAdvert::class =>
            [
                NotifyAdminAdvertCreated::class,
                SuccessAdvertCreatedNotification::class,
            ],
        ReminderEmail::class =>
            [
                SendReminderToUser::class,
            ],
        UserDidASearch::class =>
            [
                ZeroSearchResultsNotifier::class
            ],
        CancelUnansweredBookingTriggered::class =>
            [
                RemoveUnansweredAdvertFromProf::class,
                NotifyProfAndStudentUnansweredBookingCancelled::class
            ],
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
