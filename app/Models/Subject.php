<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

    protected $table = 'subjects';


    public function subSubjects(){

       return  $this->hasMany( \App\Models\SubSubject::class , 'parent_id');
    }


}