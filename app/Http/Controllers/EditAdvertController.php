<?php
namespace App\Http\Controllers;

use App\Events\ProfCreatedAdvert;
use App\Http\Requests\Request;
use App\Models\Advert;
use App\Models\Avatar;
use App\Models\Subject;
use App\Models\SubjectsPerAdvert;
use App\Models\SubSubject;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class EditAdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware('ownsAdvert');
    }

    public function editStep1($advert_id)
    {
        $subjects    = Subject::orderBy('name', 'ASC')->get();
        $subsubjects = implode(',', SubSubject::all()->pluck('name')->toArray());

        $advert = Advert::findOrFail($advert_id);

        $checkedSubjects = SubjectsPerAdvert::select('subject_id')
            ->where('advert_id', $advert->id)
            ->get()
            ->pluck('subject_id')
            ->toArray();

        $step = 1;
        return view('dashboard.edit')->with(compact('subjects', 'subsubjects', 'checkedSubjects', 'advert_id', 'step', 'advert'));
    }

    public function postEditStep1 ($advert_id, \Illuminate\Http\Request $request)
    {

        $this->validate($request, [
            'subjects' => "required",
        ], ['required' => 'Veuillez choisir une activité'], []);

        $subjectsArray = \Input::get('subjects');

        // 3. Get Subject Names
        $subjectsText = explode(',', \Input::get('subjects_text'));

        // 4 . Input cleaning
        $subjectsText = array_filter(array_map(function ($item) {
            return trim($item);
        }, $subjectsText), function ($item) {
            if (empty($item) == false) return true;
        });

        $subjectObjects = SubSubject::whereIn('name', $subjectsText)->get()->pluck('id')->toArray();

        $subjectsArray = array_merge($subjectsArray, $subjectObjects);

        SubjectsPerAdvert::fillSubjectForAdvert($advert_id, $subjectsArray);

        return redirect("modifier-annonce-2/{$advert_id}");
    }

    public function editStep2($advert_id)
    {
        $subjectsArray = SubjectsPerAdvert::where('advert_id', $advert_id)->pluck('subject_id')->toArray();

        // 3. Return data necessary for next step
        $subjects = SubSubject::whereIn('id', $subjectsArray)->get();
        $levels   = Level::all();

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
        $advert = Advert::findOrFail($advert_id);
        $step   = 2;

        return view('dashboard.edit')->with(compact('subjects', 'levels', 'advert_id', 'advert', 'checked', 'step'));
    }

    public function postEditStep2($advert_id, \Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'title'  => "required",
            'levels' => "required",
        ], ['title.required'  => 'Veuillez choisir un titre',
            'levels.required' => 'Veuillez choisir les niveaux enseignés pour chaque activité'], []);

        $levels = \Input::get('levels');
        $title  = \Input::get('title');

        \App\Models\Advert::find($advert_id)->update(['title' => $title]);
        SubjectsPerAdvert::fillLevelsPerSubjects($advert_id, $levels);

        return redirect("modifier-annonce-3/{$advert_id}");
    }

    public function editStep3($advert_id)
    {
        $advert = Advert::findOrFail($advert_id);
        $step   = 3;

        return view('dashboard.edit')->with(compact('advert_id', 'advert', 'step'));
    }

    public function postEditStep3($advert_id, \Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'location' => "required",
        ], ['location.required' => 'Veuillez choisir le lieu où se dérouleront les cours',
            'levels.required'   => 'Veuillez choisir les niveaux enseignés pour chaque activité'], []);

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

        dd($request->all());

        $values   = \Request::only(array_values($table));
        $keys     = array_keys($table);
        $loc_data = array_combine($keys, $values);

        \App\Models\Advert::find($advert_id)->update($loc_data);

        return redirect("modifier-annonce-4/{$advert_id}");
    }

    public function editStep4($advert_id)
    {
        $advert = Advert::findOrFail($advert_id);
        $step   = 4;

        return view('dashboard.edit')->with(compact('advert_id', 'advert', 'step'));
    }

    public function postEditStep4($advert_id, \Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'presentation' => "required",
            'content'      => "required",
            'experience'   => "required",
        ], ['presentation.required' => 'Veuillez remplir le champ description et expertise',
            'content.required'    => 'Veuillez remplir le champ expérience',
            'experience.required' => 'Veuillez remplir le champ CV et formation'], []);

        $content_data = \Request::only(['presentation',
                                           'content',
                                           'experience']);

        \App\Models\Advert::find($advert_id)->update($content_data);

        return redirect("modifier-annonce-5/{$advert_id}");
    }

    public function editStep5($advert_id)
    {
        $advert     = Advert::findOrFail($advert_id);
        $can_travel = $advert->can_travel;
        $can_webcam = $advert->can_webcam;

        $step = 5;

        return view('dashboard.edit')->with(compact('advert_id', 'advert', 'can_travel', 'can_webcam', 'step'));
    }

    public function postEditStep5($advert_id, \Illuminate\Http\Request $request)
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

        $data = \Request::only($only);

        \App\Models\Advert::find($advert_id)->update($data);

        return redirect("modifier-annonce-6/{$advert_id}");
    }

    public function editStep6($advert_id)
    {
        $advert = Advert::findOrFail($advert_id);

        $step = 6;

        return view('dashboard.edit')->with(compact('advert_id', 'advert', 'step'));
    }

    public function postEditStep6($advert_id, \Illuminate\Http\Request $request)
    {
        if(Avatar::hasAvatar(Auth::id()) == false) {
            $this->validate($request, [
                'img_upload' => "required",
            ], ['img_upload.required' => 'La photo est nécessaire pour pouvoir créer une annonce'], []);

        }

        $avatar = json_decode(Input::get('img_upload'));

        if ($avatar) {
            $output   = $avatar->output;
            $filename = '/tmp/'.str_random(10);
            base64_to_jpeg($output->image, $filename);

            $m              = \App\Models\Avatar::firstOrCreate(['user_id' => Auth::id()]);
            $m->img         = file_get_contents($filename);
            $m->img_cropped = file_get_contents($filename);
            $m->img_name    = $output->name;
            $m->img_mime    = $output->type;
            $m->img_size    = filesize($filename);
            $m->save();
        }

        return redirect()->action('DashboardController@index');
    }

    public function editStep7($advert_id)
    {
        $advert = Advert::findOrFail($advert_id);

        $step = 7;

        return view('dashboard.edit')->with(compact('advert_id', 'advert', 'step'));
    }


    public function deactivateAdvert($advert_id)
    {
        $advert = Advert::find($advert_id);
        $advert->unpublish();
        thanks("Votre annonce a été désactivée, elle ne sera plus visible sur le site. Vous pouvez la réactiver à partir de votre tableau de bord.");
        return redirect()->back();
    }

    public function deleteAdvert($advert_id)
    {
        $advert = Advert::find($advert_id);
        $advert->delete();
        thanks("Votre annonce a été supprimée avec succès");
        return redirect()->back();
    }

    public function activateAdvert($advert_id)
    {
        $advert = Advert::find($advert_id);
        if($advert->notPublished())
        {
            $advert->publish();
            event(new ProfCreatedAdvert($advert));
            thanks("Votre annonce est maintenant en cours de validation");
        }

        return redirect()->back();
    }
}