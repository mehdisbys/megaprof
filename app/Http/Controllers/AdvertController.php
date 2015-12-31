<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
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

    public function postStep3(Request $request)
    {
        $advert_id = $request->input('advert_id');

        $table = [
            'location_lat' => 'latitude',
            'location_long' => 'longitude',
            'location_postcode' => 'postcode',
            'location_city' => 'city',
            'location_country' => 'country',
            'location_street' => 'address',
            'travel_radius' => 'radius',
            'can_travel' => 'can_travel',
            'can_receive' => 'can_receive',
            'can_webcam' => 'can_webcam'
        ];

        $values = $request->only(array_values($table));
        $keys = array_keys($table);
        $loc_data = array_combine($keys, $values);

        \App\Models\Advert::find($advert_id)->update($loc_data);

        return view('professeur.advert.createStep4')->with(compact('advert_id'));
    }

    public function postStep4(Request $request)
    {
        $advert_id = $request->input('advert_id');

        $content_data = $request->only(['presentation', 'content', 'experience']);

        \App\Models\Advert::find($advert_id)->update($content_data);

        $advert = \App\Models\Advert::find($advert_id);

        $can_travel = $advert->can_travel;

        $can_webcam = $advert->can_webcam;

        return view('professeur.advert.createStep5')->with(compact('advert_id','can_travel', 'can_webcam'));
    }

    public function postStep5(Request $request)
    {
        $advert_id = $request->input('advert_id');

        $only = [
            "price" ,
            "price_travel_percentage",
            "price_travel" ,
            "price_webcam_percentage" ,
            "price_webcam" ,
            "price_5_hours_percentage",
            "price_10_hours_percentage",
            "price_5_hours" ,
            "price_10_hours" ,
            "price_more"
        ];

        $data = $request->only($only);

        \App\Models\Advert::find($advert_id)->update($data);

        return view('professeur.advert.createStep6')->with(compact('advert_id'));
    }

    public function postStep6(Request $request)
    {
        $advert_id = $request->input('advert_id');

        $coord = $request->only(['w','h','x','y','r']);

        $m = new Avatar();

        $webcam = $request->file('img_upload') ? false : true;

        if(! $webcam)
        {
            $filename = 'img_upload';
            $m->handleFile($filename);
            $m->cropAvatar($filename, $coord);
        }

        else
        {
            $filename = 'webcam_img';
            $m->cropAvatar($filename, $coord, true);
        }

        $m->user_id = 1;
        $m->save();

        return view('professeur.advert.createComplete')->with(compact('advert_id'));

    }
}
