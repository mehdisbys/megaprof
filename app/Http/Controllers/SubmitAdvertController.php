<?php
namespace App\Http\Controllers;

use App\Helpers\AfterRequest;
use App\Models\Advert;
use App\Models\Avatar;
use App\Models\SubSubject;
use App\Models\Subject;
use App\Models\SubjectsPerAdvert;
use App\Models\Level;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use App\Http\Requests;


//TODO
// 1. Refactor to have a get function for each step
// 2. Decouple the core logic from input parameters and from views
// 3. Give names to each step
// 4. Use Form requests
class SubmitAdvertController extends Controller
{
    private $advertId = NULL;
    private $advert   = NULL;
    private $afterRequest;
    private $userId;

    public function __construct(Request $request, Advert $advert, AfterRequest $afterRequest, AuthManager $auth)
    {
        $this->advertId     =  $request->input('advert_id') ?? $request->session()->get('advert_id');
        $this->advert       =  $advert->find($this->advertId);
        $this->afterRequest =  $afterRequest;
        $this->userId       =  $auth->id();
    }

    public function getStep1Subjects()
    {
        $subjects        = Subject::all();

        $checkedSubjects = SubjectsPerAdvert::getSubjectsPerAdvert($this->advertId);

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }


    public function postStep1Subjects(Request $request)
    {
        // 1. Create advert linked with userid
        $advert = Advert::create(['user_id' => $this->userId]);
        $advert_id = $advert->id;

        // 2. Fill subjects_per_adverts  table
        $subjectsArray = $request->input('subjects');
        SubjectsPerAdvert::fillSubjectForAdvert($advert->id, $subjectsArray);

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function getStep2TitleAndLevels(Request $request)
    {
        $subjectsArray  = $request->session()->get('subjectsArray');
        $subjects       =  SubSubject::whereIn('id', $subjectsArray)->get();
        $levels         =  Level::all();
        $advert_id      =  $this->advertId;

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function postStep2TitleAndLevels(Request $request)
    {
        $levels     =  $request->input('levels');
        $title      =  $request->input('title');

        Advert::find($this->advertId)->update(['title' => $title]);

        SubjectsPerAdvert::fillLevelsPerSubjects($this->advertId, $levels);

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function getStep3AddressAndTravel()
    {
        $advert_id = $this->advertId;

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function postStep3AddressAndTravel(Request $request)
    {
        $advert_id = $this->advertId;

        $table = [
            'location_postcode' =>  'postcode',
            'location_country'  =>  'country',
            'location_street'   =>  'address',
            'location_long'     =>  'longitude',
            'location_city'     =>  'city',
            'travel_radius'     =>  'radius',
            'location_lat'      =>  'latitude',
            'can_receive'       =>  'can_receive',
            'can_travel'        =>  'can_travel',
            'can_webcam'        =>  'can_webcam'
        ];

        $values     =  $request->only(array_values($table));
        $keys       =  array_keys($table);
        $loc_data   =  array_combine($keys, $values);

        Advert::find($advert_id)->update($loc_data);

        return $this->afterRequest->init(__FUNCTION__, ['advert_id' => $this->advertId]);
    }

    public function getStep4ContentAndExperience()
    {
        $advert_id = $this->advertId;

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    //TODO refactor
    public function postStep4ContentAndExperience(Request $request)
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
