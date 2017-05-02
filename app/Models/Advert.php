<?php

namespace App\Models;

use App\Events\AdvertPublished;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class Advert extends Model
{

    use Sluggable;
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

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    private static $paginateCount = 20;

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
        return static::where('user_id', \Auth::id())
            ->with('subjectsPerAd')
            ->whereNotNull('published_at')
            ->whereNotNull('approved_at')
            ->orderBy('published_at', 'desc')->get();
    }

    public static function toBeReviewedtUserAdverts()
    {
        return static::where('user_id', \Auth::id())
            ->with('subjectsPerAd')
            ->whereNotNull('published_at')
            ->whereNull('approved_at')
            ->orderBy('published_at', 'desc')->get();
    }

    public static function archivedUserAdverts()
    {
        return static::where('user_id', \Auth::id())
            ->with('subjectsPerAd')
            ->whereNull('published_at')
            ->orderBy('created_at', 'desc')->get();
    }

    public static function getAllSubjectsForUser($user_id)
    {
        // return static::where('user_id', $user_id)->
    }

    public function getAvatar()
    {
        return "/avatar/{$this->user_id}";
    }

    public static function findBySlugOr404($slug)
    {
        $advert = self::where(['slug' => $slug])->whereNotNull('published_at')->first();

        return $advert ? $advert : \App::abort(404);
    }

    public static function findBySlug($slug)
    {
        return self::where(['slug' => $slug])->first();
    }

    public static function liveAdverts($limit = 10)
    {
        return self::whereNotNull('published_at')->whereNotNull('approved_at')->paginate($limit);
    }

    public function publish()
    {
        $this->approved_at = NULL;
        $this->published_at = Carbon::now();
        $this->save();
        return $this;
    }

    public function unpublish()
    {
        $this->published_at = NULL;
        $this->save();
        return $this;
    }

    public function suspend()
    {
        $this->deleted_at = Carbon::now();
        $this->save();
    }

    public function step1Done(): bool
    {
        return SubjectsPerAdvert::select('subject_id')
            ->where('advert_id', $this->id)
            ->exists();
    }

    public function step2Done(): bool
    {
        return empty($this->title) == false;
    }

    public function step3Done(): bool
    {
        return empty($this->location) == false;
    }

    public function step4Done(): bool
    {
        return ((empty($this->presentation) == false) and (empty($this->content) == false) and (empty($this->experience) == false));
    }

    public function step5Done(): bool
    {
        return $this->price != NULL;
    }

    public function step6Done(): bool
    {
       return Avatar::hasAvatar($this->user_id);
    }

    public function isApprovedByAdmin():bool
    {
        return $this->approved_at != NULL ;
    }

    public function isAwaitingApproval():bool
    {
        return $this->approved_at == NULL and $this->published_at != NULL;
    }

    public static function searchAdvertIdsByGender(array $advert_ids, string $gender)
    {
        $query = self::whereIn('id', $advert_ids);

        if (in_array($gender, ['man', 'woman'])) {
            $query = $query->whereHas('user', function ($q) use ($gender) {
                $q->where('gender', '=', $gender);
            });
        }
        return $query->get();
    }

    public static function radiusSearch(array $advertIds, $lat, $lng, int $radius = null, string $sortBy = 'distance', $gender)
    {
        $query = DB::table('adverts');

        if (in_array($gender, ['man', 'woman'])) {
            $query = $query->join('users', function ($join) use ($gender) {
                $join->on('adverts.user_id', '=', 'users.id')
                    ->where('users.gender', '=', $gender);
            });
        };

        if ($lat and $lng) {
            $query->selectRaw("*, (6371 * ACOS(COS(RADIANS({$lat})) * COS(RADIANS(location_lat)) *
    COS(RADIANS(location_long) - RADIANS({$lng})) + SIN(RADIANS({$lat})) * SIN(RADIANS(location_lat)))) AS distance");
        }

        if (isset($radius))
            $query->having('distance', '<', $radius);

        if (isset($advertIds))
            $query->whereIn('adverts.id', $advertIds);

        if ($lat and $lng and $sortBy === 'distance')
            $query->orderBy('distance', 'ASC');

        if ($sortBy === 'date')
            $query->orderBy('adverts.updated_at', 'ASC');

        if ($sortBy === 'price')
            $query->orderBy('price', 'ASC');

        return $query->paginate(self::$paginateCount);
    }


    public static function paginateResults(Collection $adverts )
    {
        return self::whereIn('id', $adverts->pluck('id'))->paginate(self::$paginateCount);
    }

    public static function paginateCount(int $count)
    {
        self::$paginateCount = $count;
    }

    public function getSubjectId()
    {
        return $this->subjectsPerAd->first()->subject_id ?? null;
    }

    public static function fullTextSearch(string $keyword)
    {
        return self::select(['id'])
            ->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('presentation', 'LIKE', "%{$keyword}%")
            ->orWhere('content', 'LIKE', "%{$keyword}%")
            ->orWhere('experience', 'LIKE', "%{$keyword}%")
            ->get()
            ->toArray();
    }

    public function getLocationText()
    {
        if (isset($this->location_city)) {
            return $this->location_city;
        }
        if (isset($this->location)) {
            $location = explode(',', $this->location);
            if (isset($location[0])) {
                return $location[0];
            }
        }
        return '';
    }

}