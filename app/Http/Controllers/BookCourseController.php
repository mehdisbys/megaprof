<?php
namespace App\Http\Controllers;


use App\Models\Advert;

class BookCourseController extends Controller
{
    public function bookLesson($advert_id)
    {
        $advert = Advert::find($advert_id);

        return view('main.bookLesson')->with(compact('advert'));
    }
}