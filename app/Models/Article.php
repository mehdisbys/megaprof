<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $guarded = ['id'];

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



}