<?php
namespace App\Http\Controllers;

use App\Events\ProfCreatedAdvert;
use App\Helpers\AfterRequest;
use App\Models\Advert;
use App\Models\SubSubject;
use App\Models\Subject;
use App\Models\SubjectsPerAdvert;
use App\Models\Level;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


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

        $checkedSubjects = [];

        if (session('advert_id')) {
            $checkedSubjects = SubjectsPerAdvert::select('subject_id')
                ->where('advert_id', session('advert_id'))
                ->get()
                ->pluck('subject_id')
                ->toArray();
        }
        return view ('professeur.advert.createStep1Subjects')->with(get_defined_vars());
    }


    public function postStep1Subjects(Request $request)
    {
        $this->validate($request, [
            'subjects' => "required",
        ], ['required' => 'Veuillez choisir une activité'], []);

        $advert    = NULL;
        $advert_id = NULL;

        if (session('advert_id') == NULL) {
            // 1. Create advert linked with userid
            $advert    = Advert::create(['user_id' => Auth::id()]);
            $advert_id = $advert->id;
            session(['advert_id' => $advert_id]);
        } else {

            $advert    = Advert::find(session('advert_id'));

            if($advert)
            {
                $advert_id = $advert->id;
            }
        }

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

        session(['subjectsArray' => $subjectsArray]);
        // 5. Fill subjects_per_advert table
        SubjectsPerAdvert::fillSubjectForAdvert($advert->id, $subjectsArray);

        return redirect()->action('SubmitAdvertController@getStep2TitleAndLevels');
      //  return $this->afterRequest->init(__FUNCTION__, get_defined_vars());
    }

    public function getStep2TitleAndLevels(Request $request)
    {
        $subjectsArray = $request->session()->get('subjectsArray');
        $subjects      = SubSubject::whereIn('id', $subjectsArray)->get();
        $levels        = Level::all();
        $advert_id     = session('advert_id');


        $checkedLevels = SubjectsPerAdvert::getLevelsPerSubjects($advert_id, $subjectsArray);
        $checked       = [];
        if ($checkedLevels) {
            $checkedLevels->filter(function ($item) use ($subjects, $levels, &$checked) {
                foreach ($subjects as $subject)
                    foreach ($levels as $level) {
                        foreach ($level->subLevels as $subs) {
                            if ($subject->id == $item->subject_id and isset($item->level_ids) and in_array($subs->id, json_decode($item->level_ids) ?? [])) {
                                $checked[$subject->id][] = $subs->id;
                            }
                        }
                    }
            }
            );
        }

        $advert = Advert::find($advert_id);

        return view('professeur.advert.createStep2TitleAndLevels')->with(get_defined_vars());
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

        return redirect()->action('SubmitAdvertController@getStep3AddressAndTravel');
    }

    public function getStep3AddressAndTravel()
    {
        $advert_id = session('advert_id');
        $advert    = Advert::find($advert_id);

        return view('professeur.advert.createStep3AddressAndTravel')->with(get_defined_vars());
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

        $values   = $request->all(array_values($table));
        $keys     = array_keys($table);
        $loc_data = array_combine($keys, $values);

        $advert = Advert::find($advert_id);

        $advert->update($loc_data);

        session(['advert_id' => $advert_id, 'advert'    => $advert]);
        return redirect()->action('SubmitAdvertController@getStep4ContentAndExperience');
    }

    public function getStep4ContentAndExperience()
    {
        $advert_id = session('advert_id');
        $advert    = Advert::find($advert_id);
        return view('professeur.advert.createStep4ContentAndExperience')->with(get_defined_vars());
    }

    public function postStep4ContentAndExperience(Request $request)
    {
        $this->validate($request, [
            'presentation' => "required",
        ], ['presentation.required' => 'Veuillez remplir le champ description et expertise'], []);


        $content_data = $request->all(['presentation',
                                           'content',
                                           'experience']);


        Advert::find(session('advert_id'))->update($content_data);

        return redirect()->action('SubmitAdvertController@getStep5PriceAndConditions');
    }

    public function getStep5PriceAndConditions()
    {
        $advert     = Advert::findOrFail(session('advert_id'));
        $advert_id  = session('advert_id');
        $can_travel = $advert->can_travel;
        $can_webcam = $advert->can_webcam;

        return view('professeur.advert.createStep5PriceAndConditions')->with(get_defined_vars());
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
            "free_first_time"
        ];

        $data = $request->all($only);

        if (!isset ($data['price_webcam_percentage']) or $data['price_webcam_percentage'] == null) {
            $data['price_webcam_percentage'] = 0;
        }

        Advert::find(session('advert_id'))->update($data);

        return redirect()->action('SubmitAdvertController@getStep6Picture');
    }

    public function getStep6Picture()
    {
        // if (Avatar::hasAvatar(Auth::id()))
        //     return $this->afterRequest->init('postStep6Picture', get_defined_vars());

        $advert_id = session('advert_id');

        return view('professeur.advert.createStep6Picture')->with(get_defined_vars());
    }

    public function postStep6Picture(Request $request)
    {

        $avatar = json_decode(Input::get('img_upload'));

        $advertId = session('advert_id') ?? $request->input('advert_id');

        $advertId = $advert_id ?? $advertId;

        if ($avatar) {
            $output   = $avatar->output;
            $filename = str_random(10);
            base64_to_jpeg($output->image, $filename);

            $m              = new \App\Models\Avatar();
            $m->user_id     = \Auth::id();
            $m->img         = file_get_contents($filename);
            $m->img_cropped = file_get_contents($filename);
            $m->img_name    = $output->name;
            $m->img_mime    = $output->type;
            $m->img_size    = filesize($filename);
            $m->advert_id   = $advertId;
            $m->save();
        }

        $this->__publish($request);

        return redirect('/mon-compte');
    }

    public function getStep7Publish(Request $request)
    {
        $this->__publish($request);

        return redirect('/mon-compte');
    }


    public function postStep7Publish(Request $request, $advert_id = NULL)
    {
        $this->__publish($request, $advert_id);

        return redirect('/mon-compte');
    }

    private function __publish(Request $request, $advert_id = NULL)
    {
        $advertId = session('advert_id') ?? $request->input('advert_id');

        $advertId = $advert_id ?? $advertId;

        $advert = Advert::find($advertId);

        if ($advert->isAllDoneExceptAvatar() == false) {
            info_message("Désolé, votre annonce est incomplète et ne peut pas être activée. 
            L'annonce doit comporter au minimum: une matière, un titre, un niveau, un lieu et une description. 
            <a href='/modifier-annonce-1/$advert->id'>Compléter mon annonce</a>");
            return redirect('/mon-compte');
        }

        $advert->publish();

        if (session('advert_id')) {
            event(new ProfCreatedAdvert($advert));
            thanks('Votre annonce a été créée avec succès !');
        }

        session()->forget('advert_id');
    }
}
