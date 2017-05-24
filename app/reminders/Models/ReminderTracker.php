<?php

namespace Reminders\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Reminders\ReminderInterface;

class ReminderTracker extends Model
{
    protected $table = 'reminders_tracker';

    protected $guarded = ['id',
        'created_at',
        'deleted_at'];

    protected $softDelete = true;


    public function user()
    {
        return $this->hasOne(User::class);
    }


    public static function reminderHasNotBeenSent(User $user, ReminderInterface $reminder): bool
    {
        return self::where([
                               'reminderId' => $reminder->getReminderId(),
                               'userId'     => $user->id,
                           ])->count() == 0;
    }

    public static function reminderWasSent(User $user, ReminderInterface $reminder)
    {
        return self::create([
                                'reminderId' => $reminder->getReminderId(),
                                'userId'     => $user->id,
                            ]);
    }
}