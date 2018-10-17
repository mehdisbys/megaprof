<?php

namespace Reminders;

use App\Events\CancelUnansweredBookingTriggered;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RemoveUnansweredBookingFromProf implements ReminderInterface
{
    private $timeBeforeRemovingAdverFromProf = 2; // hours
    private $reminderId = 'remove_unanswered_advert_from_prof';
    private $unansweredAdverts = NULL;


    public function getUsersToRemind(): Collection
    {
        return User::all();
    }

    public function getReminderId(): string
    {
        return $this->reminderId;
    }

    public function reminderIsDueForUser(User $user): bool
    {
        $unansweredBookings = Booking::getUnansweredProfBookings($user);
        $bookingsList = new \Illuminate\Support\Collection();


        foreach ($unansweredBookings as $booking) {
            if (Carbon::now()->diffInSeconds($booking->created_at) >
                $this->timeBeforeRemovingAdverFromProf) {
                $bookingsList->push($booking);
                event(new CancelUnansweredBookingTriggered($booking, $user));
            }
        }

        $this->unansweredAdverts = $bookingsList;
        return $this->unansweredAdverts->count() > 0;
    }

    public function getEmailView(): string
    {
        return "";
    }

    public function getEmailViewArguments(): Collection
    {
    }

    public function getEmailSubject(User $user): string
    {
        return "";
    }

}