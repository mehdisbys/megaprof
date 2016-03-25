<?php
namespace App\Events;

use App\Models\Advert;
use Illuminate\Queue\SerializesModels;

class AdvertPublished extends Event
{
    use SerializesModels;

    public $advert = NULL;

    /**
     * AdvertPublished constructor.
     * @param Advert $advert
     */
    public function __construct(Advert $advert)
    {
        $this->advert = $advert;
    }
}
