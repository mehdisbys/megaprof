<?php

namespace Reminders\RemindUsers;

use Illuminate\Console\Command;
use Reminders\Events\ReminderEmail;
use Reminders\Models\ReminderTracker;
use Reminders\ReminderInterface;
use Reminders\RemindUserToCreateAnAdvert;
use Reminders\RemindUserToFinishAdvert;

class RemindUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind_users:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a reminder to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // Reminders


        // Ex. Received student booking, condition=No reply in the last 1h, send specific email

        $reminders = [
            new RemindUserToCreateAnAdvert(),
            new RemindUserToFinishAdvert(),
        ];

        foreach ($reminders as $reminder) {
            $this->processReminder($reminder);
        }
    }

    private function processReminder(ReminderInterface $reminder)
    {
        $users = $reminder->getUsersToRemind();

        foreach ($users as $user) {
            if ($reminder->reminderIsDueForUser($user) and
                ReminderTracker::reminderHasNotBeenSent($user, $reminder)
            ) {

                event(new ReminderEmail($user, $reminder->getEmailView(), $reminder->getEmailViewArguments()));

                ReminderTracker::reminderWasSent($user, $reminder);
            }
        }
    }
}
