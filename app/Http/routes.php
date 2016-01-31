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
    post('/nouvelle-annonce-7', 'SubmitAdvertController@postStep7');

    get('/modifier-annonce-1/{advert_id}', 'EditAdvertController@editStep1');
    post('/modifier-annonce-1/{advert_id}', 'EditAdvertController@postEditStep1');
    post('/modifier-annonce-2/{advert_id}', 'EditAdvertController@postEditStep2');
    post('/modifier-annonce-3/{advert_id}', 'EditAdvertController@postEditStep3');
    post('/modifier-annonce-4/{advert_id}', 'EditAdvertController@postEditStep4');
    post('/modifier-annonce-5/{advert_id}', 'EditAdvertController@postEditStep5');
    post('/modifier-annonce-6/{advert_id}', 'EditAdvertController@postEditStep6');

    get('/mon-compte', 'DashboardController@index');

    get('/mise-en-relation/{advert_id}', 'BookCourseController@bookLesson');
    post('/reserver-un-cours', 'BookCourseController@postBookLesson');

});

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
get('/{slug}', 'SubmitAdvertController@view');
