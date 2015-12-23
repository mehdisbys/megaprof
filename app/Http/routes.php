<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/nouvelle-annonce-1',  'AdvertController@getStep1');
Route::post('/nouvelle-annonce-1', 'AdvertController@postStep1');
Route::post('/nouvelle-annonce-2', 'AdvertController@postStep2');
Route::post('/nouvelle-annonce-3', 'AdvertController@postStep3');
Route::post('/nouvelle-annonce-4', 'AdvertController@postStep4');

