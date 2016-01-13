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

get('/', 'ListAdvertController@index');

Route::group(['middleware' => 'auth'], function () {

    get('/nouvelle-annonce-1', 'SubmitAdvertController@getStep1');
    post('/nouvelle-annonce-1', 'SubmitAdvertController@postStep1');
    post('/nouvelle-annonce-2', 'SubmitAdvertController@postStep2');
    post('/nouvelle-annonce-3', 'SubmitAdvertController@postStep3');
    post('/nouvelle-annonce-4', 'SubmitAdvertController@postStep4');
    post('/nouvelle-annonce-5', 'SubmitAdvertController@postStep5');
    post('/nouvelle-annonce-6', 'SubmitAdvertController@postStep6');

});
post('/nouvelle-annonce-7', 'SubmitAdvertController@postStep7');

Route::get('/avatar/{user_id}/{advert_id}', 'SubmitAdvertController@getAvatar');

// Signup
get( 'inscription', 'SignupController@getSignup');
post('inscription', 'SignupController@candidateSignup');
// Confirm
get( 'register/confirm/{code}','SignupController@confirmEmail' );

// Signing in
get( 'login','SessionsController@login');
post('login','SessionsController@postLogin');
get( 'logout', 'SessionsController@logout');


Route::get('/{slug}', 'SubmitAdvertController@view');
