<?php namespace App\Http\Controllers;


use App\Models\Advert;
use App\Models\SubjectsPerAdvert;

class EditAdvertController extends Controller
{

    public function editStep1($advert_id)
    {
        $subjects = \App\Models\Subject::all();

        $advert =  Advert::findOrFail($advert_id);

        $checkedSubjects = SubjectsPerAdvert::select('subject_id')
            ->where('advert_id',$advert->id)
            ->get()
            ->pluck('subject_id')->toArray();

        return view('professeur.advert.createStep1')->with(compact('subjects', 'checkedSubjects'));
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