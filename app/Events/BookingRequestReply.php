<?php

namespace App\Events;

use App\Events\Event;
use App\Models\Booking;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BookingRequestReply extends Event
{
    use SerializesModels;

    public $booking;


    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
}
