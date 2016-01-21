<?php namespace App\Http\Controllers;


use App\Http\Requests\Request;
use App\Models\Advert;
use App\Models\SubjectsPerAdvert;

class EditAdvertController extends Controller
{

    public function editStep1($advert_id)
    {
        $subjects = \App\Models\Subject::all();

        if (Advert::where(['id' => $advert_id, 'user_id' => \Auth::id()])->exists() == false)
            return redirect()->back();

        $advert =  Advert::findOrFail($advert_id);

        $checkedSubjects = SubjectsPerAdvert::select('subject_id')
            ->where('advert_id',$advert->id)
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

        return view('professeur.advert.createStep2')->with(compact('subjects', 'levels', 'advert_id'));
    }

    public function editStep2()
    {


    }

    public function editStep3()
    {

    }

    public function editStep4()
    {

    }

    public function editStep5()
    {

    }

    public function editStep6()
    {

    }
}