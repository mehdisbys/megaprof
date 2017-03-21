<?php

namespace App\Events;


use App\Models\Advert;

class AdvertWasAcceptedByAdmin extends Event
{


    /** @var  Advert */
    public $advert;

    /**
     * AdvertWasRejectedByAdmin constructor.
     * @param Advert $advert
     */
    public function __construct(Advert $advert)
    {
        $this->advert = $advert;
    }

}