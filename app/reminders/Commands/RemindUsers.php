<?php

namespace Reminders\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Reminders\Events\ReminderEmail;
use Reminders\Models\ReminderTracker;
use Reminders\ReminderInterface;
use Reminders\RemindProfToReplyToBooking;
use Reminders\RemindProfToReplyToBookingSecondTime;
use Reminders\RemindStudentToComment;
use Reminders\RemindStudentToCommentSecondTime;
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
        $reminders = [
            new RemindUserToCreateAnAdvert(),
            new RemindUserToFinishAdvert(),
            new RemindProfToReplyToBooking(),
            new RemindProfToReplyToBookingSecondTime(),
            new RemindStudentToComment(),
            new RemindStudentToCommentSecondTime()
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
                event(new ReminderEmail($user, $reminder));
                activity()->useLog($user->email)->log('Reminder to ' . $reminder->getReminderId())->causedBy($user);
                ReminderTracker::reminderWasSent($user, $reminder);
            }
        }
    }
}
