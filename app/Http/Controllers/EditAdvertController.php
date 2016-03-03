<?php namespace App\Http\Controllers;


use App\Http\Requests\Request;
use App\Models\Advert;
use App\Models\Avatar;
use App\Models\SubjectsPerAdvert;

class EditAdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware('ownsAdvert');
    }

    public function editStep1($advert_id)
    {
        $subjects = \App\Models\Subject::all();

        if (Advert::where(['id' => $advert_id, 'user_id' => \Auth::id()])->exists() == false)
            return redirect()->back();

        $advert = Advert::findOrFail($advert_id);

        $checkedSubjects = SubjectsPerAdvert::select('subject_id')
            ->where('advert_id', $advert->id)
            ->get()
            ->pluck('subject_id')
            ->toArray();

        $step = 1;
        return view("dashboard.edit")->with(compact('subjects', 'checkedSubjects', 'advert_id', 'step', 'advert'));
    }

    public function postEditStep1($advert_id)
    {
        $subjectsArray = \Input::get('subjects');

        SubjectsPerAdvert::fillSubjectForAdvert($advert_id, $subjectsArray);

        return redirect("modifier-annonce-2/{$advert_id}");
    }

    public function editStep2($advert_id)
    {
        $subjectsArray = [SubjectsPerAdvert::where('advert_id', $advert_id)->value('subject_id')];

        // 3. Return data necessary for next step
        $subjects = \App\Models\SubSubject::whereIn('id', $subjectsArray)->get();
        $levels = \App\Models\Level::all();

        $checkedLevels = SubjectsPerAdvert::getLevelsPerSubjects($advert_id, $subjectsArray);
        $checked = [];
        if($checkedLevels) {
            $checkedLevels->filter(function ($item) use ($subjects, $levels, &$checked) {
                foreach ($subjects as $subject)
                    foreach ($levels as $level) {
                        foreach ($level->subLevels as $subs) {
                            if ($subject->id == $item->subject_id and isset($item->level_ids) and in_array($subs->id, json_decode($item->level_ids))) {
                                $checked[$subject->id][] = $subs->id;
                            }
                        }
                    }
            }
            );
        }
        $advert = Advert::findOrFail($advert_id);
        $step = 2;

        return view('dashboard.edit')->with(compact('subjects', 'levels', 'advert_id', 'advert', 'checked', 'step'));
    }

    public function postEditStep2($advert_id)
    {
        $levels = \Input::get('levels');
        $title = \Input::get('title');

        \App\Models\Advert::find($advert_id)->update(['title' => $title]);
        SubjectsPerAdvert::fillLevelsPerSubjects($advert_id, $levels);

        return redirect("modifier-annonce-3/{$advert_id}");
    }

    public function editStep3($advert_id)
    {
        $advert = Advert::findOrFail($advert_id);
        $step = 3;

        return view('dashboard.edit')->with(compact('advert_id', 'advert', 'step'));
    }

    public function postEditStep3($advert_id)
    {
        $table = [
            'can_travel' => 'can_travel',
            'can_receive' => 'can_receive',
            'can_webcam' => 'can_webcam'
        ];

        $values = \Request::only(array_values($table));
        $keys = array_keys($table);
        $loc_data = array_combine($keys, $values);

        \App\Models\Advert::find($advert_id)->update($loc_data);

        return redirect("modifier-annonce-4/{$advert_id}");
    }

    public function editStep4($advert_id)
    {
        $advert = Advert::findOrFail($advert_id);
        $step = 4;

        return view('dashboard.edit')->with(compact('advert_id', 'advert', 'step'));
    }

    public function postEditStep4($advert_id)
    {
        $content_data = \Request::only(['presentation', 'content', 'experience']);

        \App\Models\Advert::find($advert_id)->update($content_data);

       return redirect("modifier-annonce-5/{$advert_id}");
    }

    public function editStep5($advert_id)
    {
        $advert = Advert::findOrFail($advert_id);
        $can_travel = $advert->can_travel;
        $can_webcam = $advert->can_webcam;

        $step = 5;

        return view('dashboard.edit')->with(compact('advert_id', 'advert', 'can_travel', 'can_webcam', 'step'));
    }

    public function postEditStep5($advert_id)
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
            "price_more"
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

    public function postEditStep6($advert_id)
    {
        savePicture($advert_id);

        $advert = Advert::find($advert_id);

        return view('professeur.advert.createStep7')->with(compact('advert'));
    }
}