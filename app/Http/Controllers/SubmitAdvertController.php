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
use Illuminate\Support\Facades\Auth;

//TODO
// 4. Use Form requests
class SubmitAdvertController extends Controller
{
    private $advertId = NULL;
    private $advert   = NULL;
    private $afterRequest;

    public function __construct(Request $request, Advert $advert, AfterRequest $afterRequest, AuthManager $auth)
    {
        $this->afterRequest = $afterRequest;
    }

    public function getStep1Subjects()
    {
        $subjects        = Subject::orderBy('name', 'ASC')->get();
        $subsubjects     = implode(',', SubSubject::all()->pluck('name')->toArray());
     //   $checkedSubjects = SubjectsPerAdvert::getSubjectsPerAdvert($this->advertId);

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }


    public function postStep1Subjects(Request $request)
    {
        // 1. Create advert linked with userid
        $advert    = Advert::create(['user_id' => Auth::id()]);
        $advert_id = $advert->id;

        session(['advert_id' => $advert_id]);

        // 2. Get subjects ids
        $subjectsArray = $request->input('subjects') ?? [];

        // 3. Get Subject Names
        $subjectsText = explode(',', $request->input('subjects_text'));

        // 4 . Input cleaning
        $subjectsText = array_filter(array_map(function ($item) {
            return trim($item);
        }, $subjectsText), function ($item) {
            if (empty($item) == false) return true;
        });

        $subjectObjects = SubSubject::whereIn('name', $subjectsText)->get()->pluck('id')->toArray();

        $subjectsArray = array_merge($subjectsArray, $subjectObjects);

        // 5. Fill subjects_per_advert table
        SubjectsPerAdvert::fillSubjectForAdvert($advert->id, $subjectsArray);

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function getStep2TitleAndLevels(Request $request)
    {
        $subjectsArray = $request->session()->get('subjectsArray');
        $subjects      = SubSubject::whereIn('id', $subjectsArray)->get();
        $levels        = Level::all();
        $advert_id     = session('advert_id');

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function postStep2TitleAndLevels(Request $request)
    {
        $levels = $request->input('levels');
        $title  = $request->input('title');

        $this->advert = Advert::find(session('advert_id'));
        $this->advert->update(['title' => $title]);

        SubjectsPerAdvert::fillLevelsPerSubjects(session('advert_id'), $levels);

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function getStep3AddressAndTravel()
    {
        $advert_id = session('advert_id');


        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function postStep3AddressAndTravel(Request $request)
    {
        $advert_id = session('advert_id');

        $table = [
            'location'          => 'location',
            'location_postcode' => 'postal_code',
            'location_country'  => 'country',
            'location_street'   => 'formatted_address',
            'location_long'     => 'lng',
            'location_city'     => 'locality',
            'travel_radius'     => 'radius',
            'location_lat'      => 'lat',
            'can_receive'       => 'can_receive',
            'can_travel'        => 'can_travel',
            'can_webcam'        => 'can_webcam',
        ];

        $values   = $request->only(array_values($table));
        $keys     = array_keys($table);
        $loc_data = array_combine($keys, $values);

        Advert::find($advert_id)->update($loc_data);

        return $this->afterRequest->init(__FUNCTION__, ['advert_id' => $advert_id]);
    }

    public function getStep4ContentAndExperience()
    {
        $advert_id = session('advert_id');

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function postStep4ContentAndExperience(Request $request)
    {
        $content_data = $request->only(['presentation',
                                           'content',
                                           'experience']);


        Advert::find(session('advert_id'))->update($content_data);

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function getStep5PriceAndConditions()
    {
        $advert     = Advert::findOrFail(session('advert_id'));
        $advert_id  = session('advert_id');
        $can_travel = $advert->can_travel;
        $can_webcam = $advert->can_webcam;

        return $this->afterRequest->init(__FUNCTION__, array_except(get_defined_vars(), ['advert']));
    }

    public function postStep5PriceAndConditions(Request $request)
    {
        $only = [
            "price",
            "price_travel_percentage",
            "price_travel",
            "price_webcam_percentage",
            "price_webcam",
            "price_5_hours_percentage",
            "price_10_hours_percentage",
            "price_5_hours",
            "price_10_hours",
            "price_more",
        ];

        $data = $request->only($only);

        Advert::find(session('advert_id'))->update($data);

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function getStep6Picture()
    {
        if (Avatar::hasAvatar(Auth::id()))
            return $this->afterRequest->init('postStep6Picture', get_defined_vars());

        $advert_id = session('advert_id');

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function postStep6Picture(Request $request)
    {
        savePicture();

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function getStep7Publish()
    {
        $advert_id = session('advert_id');
        $advert    = Advert::find(session('advert_id'));

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function postStep7Publish(Request $request)
    {
        $advert = Advert::find(session('advert_id'));

        $advert->publish();

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }
}
