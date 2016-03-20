<?php

//Main Page
get('/', 'ListAdvertController@index');
post('/search', 'ListAdvertController@search');


get('/avatar/{user_id}/{advert_id}', 'SubmitAdvertController@getAvatar');

// Signup
get('inscription', 'SignupController@getSignup');
post('inscription', 'SignupController@candidateSignup');

// Confirm
get('register/confirm/{code}', 'SignupController@confirmEmail');

// Signing in
get('login', 'SessionsController@login');
post('login', 'SessionsController@postLogin');
get('logout', 'SessionsController@logout');


Route::group(['middleware' => 'auth'], function () {
    get('/avatar_dashboard/{user_id}', 'SubmitAdvertController@getDefaultAvatar');

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

    get('/modifier-annonce-2/{advert_id}', 'EditAdvertController@editStep2');
    post('/modifier-annonce-2/{advert_id}', 'EditAdvertController@postEditStep2');

    get('/modifier-annonce-3/{advert_id}', 'EditAdvertController@editStep3');
    post('/modifier-annonce-3/{advert_id}', 'EditAdvertController@postEditStep3');

    get('/modifier-annonce-4/{advert_id}', 'EditAdvertController@editStep4');
    post('/modifier-annonce-4/{advert_id}', 'EditAdvertController@postEditStep4');

    get('/modifier-annonce-5/{advert_id}', 'EditAdvertController@editStep5');
    post('/modifier-annonce-5/{advert_id}', 'EditAdvertController@postEditStep5');

    get('/modifier-annonce-6/{advert_id}', 'EditAdvertController@editStep6');
    post('/modifier-annonce-6/{advert_id}', 'EditAdvertController@postEditStep6');

    get('/mon-compte', 'DashboardController@index');
    get('/mon-compte/annonce-{advert_id}', 'DashboardController@editAdvert');

    get('/mise-en-relation/{advert_id}', 'BookCourseController@bookLesson');
    post('/reserver-un-cours', 'BookCourseController@postBookLesson');

    get('/demande/{booking_id}/repondre', 'BookCourseController@replyBookingRequest');
    get('/demande/{booking_id}/{answer}', 'BookCourseController@replyBookingRequest');

    //get('/avis/{prof_id}');

});

get('/{slug}', 'SubmitAdvertController@view');

