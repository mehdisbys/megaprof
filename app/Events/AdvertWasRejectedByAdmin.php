<?php

namespace App\Events;

use App\Events\Event;
use App\Models\Advert;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AdvertWasRejectedByAdmin extends Event
{
    use SerializesModels;

    public $message;

    /** @var  Advert */
    public $advert;

    /**
     * AdvertWasRejectedByAdmin constructor.
     * @param        $message
     * @param Advert $advert
     */
    public function __construct(Advert $advert, $message)
    {
        $this->message = $message;
        $this->advert  = $advert;
    }


}
