<?php

namespace Reminders\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Support\Collection;
use Reminders\ReminderInterface;

class ReminderEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var  User */
    public $user;

    /** @var  ReminderInterface */
    public $reminder;

    /**
     * ReminderEmail constructor.
     * @param User       $user
     * @param string     $view
     * @param Collection $viewArguments
     */
    public function __construct(User $user, ReminderInterface $reminder)
    {
        $this->user     = $user;
        $this->reminder = $reminder;
    }


}
