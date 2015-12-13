<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';


    public function subLevels(){

        return  $this->hasMany( \App\Models\SubLevel::class , 'parent_id');
    }
}