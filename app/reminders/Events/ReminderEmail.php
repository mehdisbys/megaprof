<?php

namespace Reminders\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Support\Collection;

class ReminderEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var  User */
    public $user;

    /** @var  string */
    public $view;

    /** @var  Collection */
    public $viewArguments;

    /**
     * ReminderEmail constructor.
     * @param User       $user
     * @param string     $view
     * @param Collection $viewArguments
     */
    public function __construct(User $user, $view, Collection $viewArguments)
    {
        $this->user          = $user;
        $this->view          = $view;
        $this->viewArguments = $viewArguments;
    }


}
