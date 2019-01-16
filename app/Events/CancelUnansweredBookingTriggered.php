<?php

namespace App\Events;

use App\Models\Booking;
use App\Models\User;

class CancelUnansweredBookingTriggered
{
    /** @var  Booking */
    public $booking;

    /** @var User */
    public $prof;


    public function __construct(Booking $booking, User $prof)
    {
        $this->booking = $booking;
        $this->prof = $prof;
    }

}