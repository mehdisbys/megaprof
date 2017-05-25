<?php
namespace Reminders;


use App\Models\Advert;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RemindUserToCreateAnAdvert implements ReminderInterface
{
    private $remindUsersToCreateAdvert = 24; // hours
    private $reminderId = 'remind_users_to_create_advert_if_none_created';

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
        /** @var Collection $userAdverts */
        $userAdverts = Advert::where(['user_id' => $user->id])->get();

        return $userAdverts->count() == 0 and Carbon::now()->diffInHours($user->created_at) > $this->remindUsersToCreateAdvert;
    }

    public function getEmailView(): string
    {
        return 'emails.reminders.remindToCreateAnAdvert';
    }

    public function getEmailViewArguments(): Collection
    {
        return new Collection();
    }

    public function getEmailSubject(User $user): string
    {
        return sprintf("%s, postez une annonce, rencontrez des élèves formidables", $user->firstname);
    }
}