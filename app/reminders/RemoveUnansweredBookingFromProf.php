<?php

namespace Reminders;

use App\Events\CancelUnansweredBookingTriggered;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RemoveUnansweredBookingFromProf implements ReminderInterface
{
    private $timeBeforeRemovingAdverFromProf = 72; // hours
    private $reminderId = 'remove_unanswered_advert_from_prof';
    private $unansweredAdverts = NULL;


    public function getUsersToRemind(): Collection
    {
        return User::all();
    }

    public function getReminderId(): string
    {
        return $this->reminderId . $this->unansweredAdverts->first()->id;
    }

    public function reminderIsDueForUser(User $user): bool
    {
        $unansweredBookings = Booking::getUnansweredProfBookings($user);
        $bookingsList = new \Illuminate\Support\Collection();


        foreach ($unansweredBookings as $booking) {
            if (Carbon::now()->diffInHours($booking->created_at) >
                $this->timeBeforeRemovingAdverFromProf) {
                $bookingsList->push($booking);
                event(new CancelUnansweredBookingTriggered($booking, $user));
                $this->unansweredAdverts = $bookingsList;
                return true;
            }
        }
        return false;
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