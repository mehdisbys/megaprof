<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdvertController extends Controller
{

    public function createStep1()
    {
        $subjects = \App\Models\Subject::all();

        return view('professeur.advert.createStep1')->with(compact('subjects'));
    }

}
