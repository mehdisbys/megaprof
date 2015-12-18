<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdvertController extends Controller
{

    public function getStep1()
    {
        $subjects = \App\Models\Subject::all();

        return view('professeur.advert.createStep1')->with(compact('subjects'));
    }

    public function postStep1(Request $request)
    {

        // 1. Create advert linked with userid
        $advert = \App\Models\Advert::create(['user_id' => 1]);

        // 2. Fill subjects_per_adverts  table
        $subjectsArray = $request->input('subjects');

        foreach ($subjectsArray as $subject_id)
        {
            \App\Models\SubjectsPerAdvert::firstOrCreate(['advert_id' => $advert->id, 'subject_id' => $subject_id]);
        }

        // 3. Return data necessary for next step
        $subjects = \App\Models\SubSubject::whereIn('id', $subjectsArray)->get();
        $levels = \App\Models\Level::all();
        $advert_id = $advert->id;

        return view('professeur.advert.createStep2')->with(compact('subjects', 'levels', 'advert_id'));
    }

    public function postStep2(Request $request)
    {
        $advert_id = $request->input('advert_id');
        $subjects = $request->input('levels');
        $title = $request->input('title');

        \App\Models\Advert::find($advert_id)->update(['title' => $title]);

        foreach ($subjects as $subject => $sublevels)
        {
                $ad = \App\Models\SubjectsPerAdvert::where(['advert_id' => $advert_id, 'subject_id' => $subject])->first();
                $ad->level_ids = json_encode($sublevels); // TODO setup model accessor functions get/set
                $ad->save();
        }

        return view('professeur.advert.createStep3')->with(compact('advert_id'));
    }
}
