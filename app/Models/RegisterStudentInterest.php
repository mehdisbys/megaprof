<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterStudentInterest extends Model
{
    use SoftDeletes;

    protected $table = 'register_student_interest';
    protected $guarded = ['id'];


}
