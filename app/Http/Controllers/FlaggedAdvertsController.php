<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;

use App\Http\Requests;

class FlaggedAdvertsController extends Controller
{
    public function getForm($slug)
    {
        $advert = Advert::findBySlugOr404($slug);

        return view('flagAdvert.FlagAdvertForm', ['advert' => $advert]);
    }
}
