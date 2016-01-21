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
        static::where('advert_id', $advert_id)->delete();

        foreach ($subjectsArray as $subject_id)
        {
            \App\Models\SubjectsPerAdvert::firstOrCreate(['advert_id' => $advert_id, 'subject_id' => $subject_id]);
        }
    }
}
