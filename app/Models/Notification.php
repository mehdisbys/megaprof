<?php
namespace App\Models;

use App\Events\BookingRequestSent;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $guarded = ['id'];


    public static function createAdvertNotification(string $name, string $message, string $link, string $advertId, string $authId)
    {
       return self::create([
            'channel'   =>  'advert',
            'name'      =>  $name,
            'message'   =>  $message,
            'user_id'   =>  $authId,
            'advert_id' =>  $advertId,
            'link'      =>  $link
        ]);
    }

    public static function AddBookingToDashboard(int $advertId, int $userId)
    {
        self::createAdvertNotification(
            'new_booking',
            'Nouvelle demande de cours',
            '',
            $advertId,
            $userId
        );
    }

    public static function currentUserNotifications()
    {
        return static::where('user_id', \Auth::id())->get();
    }
}
