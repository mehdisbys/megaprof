<?php
/**
 * Created by PhpStorm.
 * User: mercury
 * Date: 1/13/16
 * Time: 8:42 PM
 */

namespace App\Http\Controllers;


use App\Models\Advert;

class ListAdvertController extends Controller
{

    public function index()
    {
        $adverts = Advert::all();

        return view('main.index')->with(compact('adverts'));
    }
}