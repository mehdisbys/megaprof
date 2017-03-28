<?php

namespace App\Events;

use App\Models\Advert;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProfCreatedAdvert
{

    /** @var  Advert */
    public $advert;


    public function __construct(Advert $advert)
    {
        $this->advert = $advert;
    }


}
