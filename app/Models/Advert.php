<?php

namespace App\Models;

use App\Events\AdvertPublished;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Advert extends Model implements SluggableInterface
{

    use SluggableTrait;
    use SoftDeletes;

    protected $table = 'adverts';

    protected $guarded = ['id', 'created_at', 'deleted_at'];

    protected $softDelete = true;

    protected $sluggable = [
        'build_from'      => 'title',
        'save_to'         => 'slug',
        'separator'       => '-',
        'unique'          => true,
        'include_trashed' => true,
        'on_update'       => false,
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subjectsPerAd()
    {
        return $this->hasMany(SubjectsPerAdvert::class);
    }

    public static function currentUserAdverts()
    {
        return static::where('user_id', \Auth::id())->with('subjectsPerAd')->orderBy('updated_at', 'desc')->get();
    }

    public static function getAllSubjectsForUser($user_id)
    {
        // return static::where('user_id', $user_id)->
    }

    public function getAvatar()
    {
        return "/avatar/{$this->user_id}/{$this->id}";
    }

    public static function findBySlugOr404($slug)
    {
        $advert = self::where('slug', '=', $slug)->first();
        return $advert ? $advert : \App::abort(404);
    }

    public static function liveAdverts($limit = 10)
    {
        return self::whereNotNull('published_at')->limit($limit)->get();
    }

    public function publish()
    {
        $this->published_at = Carbon::now();
        $this->save();
        \Event::fire(new AdvertPublished($this));
        return $this;
    }

    public function unpublish()
    {
        $this->published_at = NULL;
        $this->save();
        return $this;
    }

    public static function radiusSearch(array $advertIds, float $lat, float $lng, int $radius = null)
    {
        $query = DB::table('adverts')
                   ->selectRaw ("*, (6371 * ACOS(COS(RADIANS({$lat})) * COS(RADIANS(location_lat)) *
    COS(RADIANS(location_long) - RADIANS({$lng})) + SIN(RADIANS({$lat})) * SIN(RADIANS(location_lat)))) AS distance")
                   ->orderBy('distance', 'ASC');

        if($radius)
            $query->having('distance', '<', $radius);

        if ($advertIds) {
            $query->whereIn('id', $advertIds);
        }

        return $query->get();
    }
}