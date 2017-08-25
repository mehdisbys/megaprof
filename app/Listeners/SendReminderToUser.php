<?php

namespace App\Listeners;

use App\Mail\ReminderMailable;
use Illuminate\Support\Facades\Mail;

class SendReminderToUser
{

    /**
     * Handle the event.
     *
     * @param  \Reminders\Events\ReminderEmail  $event
     * @return void
     */
    public function handle(\Reminders\Events\ReminderEmail $event)
    {
        if (env('APP_ENV') == 'local') {
            Mail::to('mehdi.souihed@gmail.com')->send(new ReminderMailable($event));
        } else {
            Mail::to($event->user->email)->queue(new ReminderMailable($event));
        }
    }
}
