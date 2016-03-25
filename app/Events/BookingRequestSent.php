<?php
namespace App\Events;

use App\Models\Booking;
use Illuminate\Queue\SerializesModels;

class BookingRequestSent extends Event
{
    use SerializesModels;

    public $booking;


    /**
     * BookingRequestSent constructor.
     * @param Booking $booking
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
}
