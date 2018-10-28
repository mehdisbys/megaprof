<?php

namespace App\Listeners;

use App\Events\CancelUnansweredBookingTriggered;
use App\Helpers\Contracts\MailerContract;
use App\Mail\ProfUnansweredBookingCancelled;
use App\Mail\StudentUnansweredBookingCancelled;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;

class NotifyProfAndStudentUnansweredBookingCancelled
{

    private $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  CancelUnansweredBookingTriggered $event
     * @return void
     */
    public function handle(CancelUnansweredBookingTriggered $event)
    {
        $student = $event->booking->student;
        $advert = $event->booking->advert;

        //  dd($student, $advert);

        // Dashboard Events
        Notification::createAdvertNotification('booking_cancelled',
            __('app/notifications/dashboardNotifications.profBookingCancelled', ['studentName'
            => $student->firstname]),
            '',
            $event->booking->id,
            $event->prof->id
        );

        // Dashboard Events
        Notification::createAdvertNotification('booking_cancelled',
            __('app/notifications/dashboardNotifications.studentBookingCancelled', ['advertTitle'
            => $advert->title]), // get this from language files studentBookingCancelled
            '',
            $event->booking->id,
            $event->booking->student_user_id
        );

        // Mail prof
        Mail::to($event->prof->email)->queue(new ProfUnansweredBookingCancelled
        ($event));

        // Mail student
        Mail::to($student->email)->queue(new
        StudentUnansweredBookingCancelled
        ($event));

    }
}

