<?php
namespace Reminders;



use App\Models\Advert;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RemindUserToFinishAdvert implements ReminderInterface
{
    private $remindUsersToFinishAdvert = 12; // hours
    private $reminderId = 'remind_users_to_finish_the_advert_they_started';
    private $unfinishedAdverts = NULL;

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
        $userAdverts = Advert::getUnpublishedUserAdverts($user);

        $advertsNotFinished = new \Illuminate\Support\Collection();

        foreach ($userAdverts as $advert)
        {
            if ($advert->notPublished() and Carbon::now()->diffInHours($advert->updated_at) > $this->remindUsersToFinishAdvert)
            {
                $advertsNotFinished->push($advert);
            }
        }

        $this->unfinishedAdverts = $advertsNotFinished;

        return $advertsNotFinished->count() > 0 ;
    }

    public function getEmailView(): string
    {
        return 'emails.reminders.remindToFinishCreatingAdvert';
    }

    public function getEmailViewArguments(): Collection
    {
        return $this->unfinishedAdverts ?? new Collection();
    }


    public function getEmailSubject(User $user): string
    {
        return sprintf("%s, votre annonce est presque prête à être publiée", $user->firstname);
    }

}