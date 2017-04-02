<?php
namespace App\Http\Controllers;

use App\Events\ProfCreatedAdvert;
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
use Illuminate\Support\Facades\Input;

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
        $subjects    = Subject::orderBy('name', 'ASC')->get();
        $subsubjects = implode(',', SubSubject::all()->pluck('name')->toArray());
        //   $checkedSubjects = SubjectsPerAdvert::getSubjectsPerAdvert($this->advertId);

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }


    public function postStep1Subjects(Request $request)
    {
        $this->validate($request, [
            'subjects' => "required",
        ], ['required' => 'Veuillez choisir une activité'], []);


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
        $this->validate($request, [
            'title'  => "required",
            'levels' => "required",
        ], ['title.required'  => 'Veuillez choisir un titre',
            'levels.required' => 'Veuillez choisir les niveaux enseignés pour chaque activité'], []);

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
        $this->validate($request, [
            'location' => "required",
        ], ['location.required' => 'Veuillez choisir le lieu où se dérouleront les cours',
            'levels.required'   => 'Veuillez choisir les niveaux enseignés pour chaque activité'], []);

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
        $this->validate($request, [
            'presentation' => "required",
            'content'      => "required",
            'experience'   => "required",
        ], ['presentation.required' => 'Veuillez remplir le champ description et expertise',
            'content.required'    => 'Veuillez remplir le champ expérience',
            'experience.required' => 'Veuillez remplir le champ CV et formation'], []);


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
        $this->validate($request, [
            'price' => "required",
        ], ['price.required' => 'Veuillez indiquer le prix par heure de cours'], []);

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
        // if (Avatar::hasAvatar(Auth::id()))
        //     return $this->afterRequest->init('postStep6Picture', get_defined_vars());

        $advert_id = session('advert_id');

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function postStep6Picture(Request $request)
    {
        if(Avatar::hasAvatar(Auth::id()) == false) {
            $this->validate($request, [
                'img_upload' => "required",
            ], ['img_upload.required' => 'La photo est nécessaire pour pouvoir créer une annonce'], []);

        }
        $avatar = json_decode(Input::get('img_upload'));

        if ($avatar) {
            $output   = $avatar->output;
            $filename = str_random(10);
            base64_to_jpeg($output->image, $filename);

            $m              = \App\Models\Avatar::firstOrCreate(['user_id' => \Auth::id()]);
            $m->img         = file_get_contents($filename);
            $m->img_cropped = file_get_contents($filename);
            $m->img_name    = $output->name;
            $m->img_mime    = $output->type;
            $m->img_size    = filesize($filename);
            $m->save();
        }

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
        $request->input('advert_id');
        $advert              = Advert::find(session('advert_id') ?? $request->input('advert_id'));
        $advert->approved_at = NULL;
        $advert->publish();

        event(new ProfCreatedAdvert($advert));

        return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }
}
