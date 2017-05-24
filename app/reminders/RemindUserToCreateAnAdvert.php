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
        $userAdverts = Advert::getUserAdverts($user);

        return $userAdverts->count() == 0 and Carbon::now()->diffInHours($user->created_at) > $this->remindUsersToCreateAdvert;
    }

    public function getEmailView(): string
    {
        return '';
    }

    public function getEmailViewArguments(): Collection
    {
        return new Collection();
    }
}