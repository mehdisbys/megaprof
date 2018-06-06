<?php


namespace Reminders;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Support\Collection;
use Carbon\Carbon;


class RemindUserToAddAnAvatar
{
    private $reminderId = 'remind_students_and_profs_to_add_an_avatar';
    private $daysAfterAdvertCreated = 48; // hours
    private $currentCommentId = '';
    private $currentProf = NULL;
    private $currentAdvert = NULL;

    public function getUsersToRemind(): Collection
    {
        $users = User::all();
        $selected = collect();

        foreach ($users as $user) {
            if (Avatar::hasAvatar($user->id) == false) {
                $selected->push($user);
            }
        }

        if ($selected->isNotEmpty()) {
            return User::find($selected->toArray());
        }
        return new Collection();
    }

    public function getReminderId(): string
    {
        return $this->reminderId;
    }

    public function reminderIsDueForUser(\App\Models\User $user): bool
    {
        $this->currentAdvert = $user->getFirstAdvertForUser($user->id);

        if ($this->currentAdvert != null and Carbon::now()->diffInHours($this->currentAdvert->created_at) > $this->daysAfterAdvertCreated) {
            return true;
        }

        return false;
    }

    public function getEmailView(): string
    {
        return 'emails.reminders.remindToAddAvatarIfHasCreatedAnAdvert';
    }

    public function getEmailViewArguments(): Collection
    {
        return new Collection(['advert' => $this->currentAdvert]);
    }

    public function getEmailSubject(User $user): string
    {
        return sprintf("%s, boostez votre annonce avec une photo sur Taelam !", $user->firstname);
    }
}