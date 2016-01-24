<?php namespace App\Http\Controllers;


use App\Http\Requests\Request;
use App\Models\Advert;
use App\Models\Avatar;
use App\Models\SubjectsPerAdvert;

class EditAdvertController extends Controller
{

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

        return view('professeur.advert.createStep1')->with(compact('subjects', 'checkedSubjects', 'advert_id'));
    }

    public function postEditStep1($advert_id)
    {
        $subjectsArray = \Input::get('subjects');
        SubjectsPerAdvert::fillSubjectForAdvert($advert_id, $subjectsArray);

        // 3. Return data necessary for next step
        $subjects = \App\Models\SubSubject::whereIn('id', $subjectsArray)->get();
        $levels = \App\Models\Level::all();

        $checkedLevels = SubjectsPerAdvert::getLevelsPerSubjects($advert_id, $subjectsArray);
        $checked = [];
        $checkedLevels->filter(function ($item) use ($subjects, $levels, &$checked) {
            foreach ($subjects as $subject)
                foreach ($levels as $level) {
                    foreach ($level->subLevels as $subs) {
                        if ($subject->id == $item->subject_id and in_array($subs->id, json_decode($item->level_ids))) {
                            $checked[$subject->id][] = $subs->id;
                        }
                    }
                }
        }
        );
        //dd($checked);
        $advert = Advert::findOrFail($advert_id);

        return view('professeur.advert.createStep2')->with(compact('subjects', 'levels', 'advert_id', 'advert', 'checked'));
    }

    public function postEditStep2($advert_id)
    {
        $levels = \Input::get('levels');
        $title = \Input::get('title');

        \App\Models\Advert::find($advert_id)->update(['title' => $title]);

        SubjectsPerAdvert::fillLevelsPerSubjects($advert_id, $levels);

        $advert = Advert::findOrFail($advert_id);

        return view('professeur.advert.createStep3')->with(compact('advert_id', 'advert'));
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
        $advert = Advert::findOrFail($advert_id);

        return view('professeur.advert.createStep4')->with(compact('advert_id', 'advert'));
    }

    public function postEditStep4($advert_id)
    {
        $advert = Advert::findOrFail($advert_id);

        $content_data = \Request::only(['presentation', 'content', 'experience']);

        \App\Models\Advert::find($advert_id)->update($content_data);

        $advert = \App\Models\Advert::find($advert_id);

        $can_travel = $advert->can_travel;
        $can_webcam = $advert->can_webcam;

        return view('professeur.advert.createStep5')->with(compact('advert_id', 'advert', 'can_travel', 'can_webcam'));
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
        $advert = \App\Models\Advert::find($advert_id);

        return view('professeur.advert.createStep6')->with(compact('advert_id', 'advert'));
    }

    public function postEditStep6($advert_id)
    {
        savePicture($advert_id);

        $advert = Advert::find($advert_id);

        return view('professeur.advert.createStep7')->with(compact('advert'));
    }
}