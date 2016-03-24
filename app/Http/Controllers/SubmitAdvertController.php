<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Avatar;
use App\Models\SubSubject;
use App\Models\Subject;
use App\Models\SubjectsPerAdvert;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Requests;

class SubmitAdvertController extends Controller
{

    public function __construct()
    {

    }

    public function getStep1()
    {
        $subjects = Subject::all();

        return view('professeur.advert.createStep1')->with(compact('subjects'));
    }

    public function postStep1(Request $request)
    {
        // 1. Create advert linked with userid
        $advert = Advert::create(['user_id' => \Auth::id()]);

        // 2. Fill subjects_per_adverts  table
        $subjectsArray = $request->input('subjects');
        SubjectsPerAdvert::fillSubjectForAdvert($advert->id, $subjectsArray);

        // 3. Return data necessary for next step
        $subjects   =  SubSubject::whereIn('id', $subjectsArray)->get();
        $levels     =  Level::all();
        $advert_id  =  $advert->id;

        return view('professeur.advert.createStep2')->with(compact('subjects', 'levels', 'advert_id'));
    }

    public function postStep2(Request $request)
    {
        $advert_id  =  $request->input('advert_id');
        $levels     =  $request->input('levels');
        $title      =  $request->input('title');

        Advert::find($advert_id)->update(['title' => $title]);

        SubjectsPerAdvert::fillLevelsPerSubjects($advert_id, $levels);

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

        $values     =  $request->only(array_values($table));
        $keys       =  array_keys($table);
        $loc_data   =  array_combine($keys, $values);

        Advert::find($advert_id)->update($loc_data);

        return view('professeur.advert.createStep4')->with(compact('advert_id'));
    }

    public function postStep4(Request $request)
    {
        $advert_id    =  $request->input('advert_id');

        $content_data =  $request->only(['presentation', 'content', 'experience']);

        Advert::find($advert_id)->update($content_data);

        $advert       =  Advert::find($advert_id);

        $can_travel   =  $advert->can_travel;

        $can_webcam   =  $advert->can_webcam;

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

        Advert::find($advert_id)->update($data);

        return view('professeur.advert.createStep6')->with(compact('advert_id'));
    }

    public function postStep6(Request $request)
    {
        $advert_id = $request->input('advert_id');

        savePicture($advert_id);

        $advert = Advert::find($advert_id);

        return view('professeur.advert.createStep7')->with(compact('advert'));
    }

    public function postStep7(Request $request)
    {
        $advert_id = $request->input('advert_id');

        $advert    = Advert::find($advert_id);

        $advert->publish();

        return view('professeur.advert.view')->with(compact('advert'));
    }


    public function view($slug)
    {
        $advert = Advert::findBySlugOr404($slug);

        return view('professeur.advert.view')->with(compact('advert'));
    }


    public function getAvatar($user_id, $advert_id)
    {
        return Avatar::getAvatar($user_id, $advert_id);
    }

    public function getDefaultAvatar($user_id)
    {
        return Avatar::getDashboardAvatar($user_id);
    }
}
