<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
        'build_from' => 'title',
        'save_to' => 'slug',
        'separator' => '-',
        'unique' => true,
        'include_trashed' => true,
        'on_update' => false,
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
    public static $defaultRadius = 30;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subjectsPerAd()
    {
        return $this->hasMany(SubjectsPerAdvert::class);
    }

    public function avatar()
    {
        return $this->hasMany(Avatar::class);
    }

    /**
     * @param $query Builder
     * @return Builder
     */
    public function scopeApproved($query)
    {
        return $query->whereNotNull('approved_at');
    }

    public static function currentUserAdverts()
    {
        return static::getAdvertsForUserId(\Auth::id());

    }

    public static function getUnpublishedUserAdverts(User $user)
    {
        return static::where('user_id', $user->id)
            ->whereNull('published_at')
            ->whereNull('approved_at')
            ->get();
    }

    private static function getAdvertsForUserId(int $userId)
    {
        return static::where('user_id', $userId)
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

    public function getAdvertAvatar()
    {
        return "/avatarb/{$this->user_id}/{$this->id}";
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

    public function notPublished(): bool
    {
        return $this->published_at == NULL;
    }

    public function published(): bool
    {
        return $this->published_at != NULL;
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
        return (empty($this->presentation) == false);
    }

    public function step5Done(): bool
    {
        return $this->price != NULL;
    }

    public function step6Done(): bool
    {
        return Avatar::hasAvatar($this->user_id);
    }

    public function isAllDoneExceptAvatar(): bool
    {
        return $this->step1Done() and $this->step2Done()
            and $this->step3Done() and $this->step4Done()
            and $this->step5Done();
    }

    public function isApprovedByAdmin(): bool
    {
        return $this->approved_at != NULL;
    }

    public function isAwaitingApproval(): bool
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


    public static function radiusSearch($lat, $lng, int $radius = null, string $sortBy, $gender, $subjectId, array $exceptAdvertIds = [])
    {
        $query = DB::table('adverts');

        $query->whereNotNull('approved_at');

        $query->whereNotIn('adverts.id', $exceptAdvertIds);

        $query->leftJoin('avatar', 'adverts.id', '=', 'avatar.advert_id')->select(["adverts.*", "avatar.img"]);

        $query->join('subjects_per_advert', 'adverts.id', '=', 'subjects_per_advert.advert_id')
            ->where(['subjects_per_advert.subject_id' => $subjectId]);

        if (in_array($gender, ['man', 'woman'])) {
            $query = $query->join('users', function ($join) use ($gender) {
                $join->on('adverts.user_id', '=', 'users.id')
                    ->where('users.gender', '=', $gender);
            });
        };

        if ($lat and $lng) {
            $query->selectRaw("(6371 * ACOS(COS(RADIANS({$lat})) * COS(RADIANS(location_lat)) *
    COS(RADIANS(location_long) - RADIANS({$lng})) + SIN(RADIANS({$lat})) * SIN(RADIANS(location_lat)))) AS distance");
        }

        if ($radius === null)
            $radius = self::$defaultRadius;

        if (isset($radius) and $lat and $lng)
            $query->whereRaw("(6371 * ACOS(COS(RADIANS({$lat})) * COS(RADIANS(location_lat)) *
    COS(RADIANS(location_long) - RADIANS({$lng})) + SIN(RADIANS({$lat})) * SIN(RADIANS(location_lat)))) <  {$radius} ");


        if ($lat and $lng and $sortBy === 'distance')
            $query->orderBy('distance', 'ASC');

        if ($sortBy === 'date')
            $query->orderBy('adverts.updated_at', 'ASC');

        if ($sortBy === 'price')
            $query->orderBy('price', 'ASC');

        if ($sortBy === 'avatar')
            $query->orderByRaw('avatar.img DESC');

        return $query->paginate(self::$paginateCount);
    }


    public static function paginateResults(Collection $adverts)
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
            ->approved()
            ->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('presentation', 'LIKE', "%{$keyword}%")
            ->orWhere('content', 'LIKE', "%{$keyword}%")
            ->orWhere('experience', 'LIKE', "%{$keyword}%")
            ->get()
            ->toArray();
    }

    public function getLocationText()
    {
        if (isset($this->location_city) and empty($this->location_city) == false) {
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
