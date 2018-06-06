<?php


namespace Reminders;

use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RemindStudentToCommentSecondTime implements ReminderInterface
{
    private $reminderId       = 'remind_students_to_comment_on_an_accepted_booking_second_time';
    private $daysAfterAcceptedBooking = 7; // days
    private $currentCommentId = '';
    private $currentProf      = NULL;
    private $currentAdvert    = NULL;

    public function getUsersToRemind(): Collection
    {
        $userids = Comment::whereNull('comment')
            ->where('comment_at', '<', Carbon::now()
            ->addDays(- $this->daysAfterAcceptedBooking))
            ->pluck('source_user_id');

        if ($userids->isNotEmpty()) {
            return User::find($userids->toArray());
        }
        return new Collection();
    }

    public function getReminderId(): string
    {
        return $this->reminderId . $this->currentCommentId;
    }

    public function reminderIsDueForUser(\App\Models\User $user): bool
    {
        /** @var Comment $comment */
        $comment = Comment::userPendingComments($user->id)->first();

        if ($comment) {
            $this->currentCommentId = $comment->id;
            $this->currentProf      = $comment->targetUser;
            $this->currentAdvert    = $comment->advert;
            return true;
        }
        return false;
    }

    public function getEmailView(): string
    {
        return 'emails.reminders.remindToCommentOnProfSecondTime';
    }

    public function getEmailViewArguments(): Collection
    {
        return new Collection(['prof'=> $this->currentProf, 'advert' =>$this->currentAdvert]);
    }

    public function getEmailSubject(User $user): string
    {
        return sprintf("%s, comment s'est passé votre cours ?", $user->firstname);
    }

}