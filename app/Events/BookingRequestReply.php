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

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
