<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserRatings extends Model
{

    protected $table = 'user_ratings';


    protected $guarded = ['id'];


    protected $hidden = ['password', 'confirmation_code', 'confirmed', 'remember_token', 'token'];

    public static function updateUserRatings($userId, $rating)
    {
        $userRatings = self::firstOrCreate(['user_id' => $userId]);

        $total = $userRatings->ratings_total;

        if($total === NULL)
            $total = 0;

        $userRatings->ratings_total = $total + $rating;
        $userRatings->ratings_count++;
        $userRatings->ratings_average = $userRatings->ratings_total / $userRatings->ratings_count;
        $userRatings->save();
        return true;
    }

}