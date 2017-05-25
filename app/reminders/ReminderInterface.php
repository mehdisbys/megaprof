<?php

namespace Reminders;

use App\Models\User;
use Illuminate\Support\Collection;

interface ReminderInterface
{

    public function getUsersToRemind(): Collection;

    public function getReminderId(): string;

    public function reminderIsDueForUser(\App\Models\User $user): bool;

    public function getEmailView(): string;

    public function getEmailViewArguments(): Collection;

    public function getEmailSubject(User $user): string;

}