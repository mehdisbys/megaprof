<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectsPerAdvert extends Model
{
    protected $table = 'subjects_per_advert';

    protected $guarded = [];

    public function subsubjects()
    {
        return $this->belongsTo(SubSubject::class, 'subject_id');
    }

    public static function fillSubjectForAdvert($advert_id, $subjectsArray)
    {
        static::where('advert_id', $advert_id)->whereNotIn('subject_id', $subjectsArray)->delete();

        foreach ($subjectsArray as $subject_id)
        {
            \App\Models\SubjectsPerAdvert::firstOrCreate(['advert_id' => $advert_id, 'subject_id' => $subject_id]);
        }
    }

    public static function fillLevelsPerSubjects($advert_id, $subjects)
    {
        foreach ($subjects as $subject => $sublevels)
        {
            $ad = \App\Models\SubjectsPerAdvert::where(['advert_id' => $advert_id, 'subject_id' => $subject])->first();
            $ad->level_ids = json_encode($sublevels); // TODO setup model accessor functions get/set
            $ad->save();
        }
    }

    public static function getLevelsPerSubjects($advert_id, $subjects)
    {
        return static::whereIn('subject_id', $subjects)
            ->where('advert_id', $advert_id)
            ->select('subject_id', 'level_ids')
          //  ->select('level_ids')
            ->get()
            //->pluck('level_ids')
            ;
    }

    public static function getSubjectsPerAdvert(int $advertId = NULL)
    {
        self::select('subject_id')
            ->where('advert_id', $advertId)
            ->get()
            ->pluck('subject_id')
            ->toArray();
    }

    public static function getAllAdvertIdsForSubject(int $subjectId): array
    {
       return self::where('subject_id', $subjectId)
           ->get()
           ->pluck('advert_id')
           ->toArray();
    }
}
