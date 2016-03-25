<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    public static function createAdvertNotification(string $name, string $message, string $link, string $advertId)
    {
       return self::create([
            'channel'   =>  'advert',
            'name'      =>  $name,
            'message'   =>  $message,
            'user_id'   =>  \Auth::id(),
            'advert_id' =>  $advertId,
            'link'      =>  $link
        ]);
    }
}
