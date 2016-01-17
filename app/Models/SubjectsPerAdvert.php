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

}
