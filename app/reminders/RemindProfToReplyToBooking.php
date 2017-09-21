<?php


namespace Reminders;

use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RemindProfToReplyToBooking implements ReminderInterface
{
    private $remindUsersToFinishAdvert = 6; // hours
    private $reminderId = 'remind_prof_to_reply_to_student_booking';
    private $unfinishedBookings = NULL;

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
        $userBookings = Booking::getProfBookingRequests($user);

        $bookingsWithoutReply = new \Illuminate\Support\Collection();

        foreach ($userBookings as $booking)
        {
            if (Carbon::now()->diffInHours($booking->updated_at) > $this->remindUsersToFinishAdvert)
            {
                $bookingsWithoutReply->push($booking);
            }
        }

        $this->unfinishedBookings = $bookingsWithoutReply;

        return $bookingsWithoutReply->count() > 0 ;
    }

    public function getEmailView(): string
    {
        return 'emails.reminders.remindToReplyToStudentBooking';
    }

    public function getEmailViewArguments(): Collection
    {
        return $this->unfinishedBookings ?? new Collection();
    }


    public function getEmailSubject(User $user): string
    {
        return sprintf("%s, n'oubliez pas de répondre à votre réservation de cours", $user->firstname);
    }
}