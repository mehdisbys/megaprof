<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $guarded = ['id'];


    public static function createAdvertNotification(string $name, string $message, string $link, string $advertId, string $authId)
    {
        if(self::where(['name' =>  $name, 'message' =>  $message, 'user_id'   =>  $authId ])->exists() == false ) {
            return self::create([
                'channel'   => 'advert',
                'name'      => $name,
                'message'   => $message,
                'link'      => $link,
                'user_id'   => $authId,
                'advert_id' => $advertId,
            ]);
        }
    }

    public static function AddBookingToDashboard(int $advertId, int $userId, User $user)
    {
        self::createAdvertNotification(
            'new_booking',
            'Nouvelle demande de cours : '. "{$user->firstname} souhaite réserver un cours avec vous, répondez à sa demande en allant dans \"Mes demandes de cours\"",
            "/" . Advert::find($advertId)->slug,
            $advertId,
            $userId
        );
    }

    public static function newCommentNotification(int $advertId, int $userId, string $username, string $link)
    {
        self::createAdvertNotification(
            'new_comment',
            "Nouveau commentaire de la part de {$username}",
            $link,
            $advertId,
            $userId
        );
    }

    public static function currentUserNotifications()
    {
        return static::where(['user_id' => \Auth::id(), 'hide' => 0])->get();
    }

    public static function currentUserNotificationsCount()
    {
        $count = static::where(['user_id' => \Auth::id(), 'hide' => 0])->count();
        return  $count > 0 ? $count : null;
    }
}
