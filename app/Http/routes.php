<?php
use Illuminate\Support\Facades\Route;

//TODO pull request to throw exception if two routes have the same name

Route::group(['middleware' => ['web']], function () {

//Main Page
    Route::get('/', 'ListAdvertController@index');
    Route::get('/annonces', 'ListAdvertController@allAdverts');
    Route::post('/search', 'ListAdvertController@search');

    Route::get('/avatar/{user_id}/{advert_id}', 'AvatarController@getAvatar');

// Signup
    Route::get('inscription', 'SignupController@getSignup');
    Route::post('inscription', 'SignupController@candidateSignup');

// Confirm
    Route::get('register/confirm/{code}', 'SignupController@confirmEmail');

// Signing in
    Route::get('login', 'SessionsController@login');
    Route::post('login', 'SessionsController@postLogin');
    Route::get('logout', 'SessionsController@logout');


    Route::group(['middleware' => ['auth']], function () {

        Route::get('/avatar_dashboard/{user_id}', 'AvatarController@getDefaultAvatar');

        Route::group(['middleware' => ['afterAdvert']], function () {

            Route::get('/nouvelle-annonce-1', 'SubmitAdvertController@getStep1Subjects');
            Route::post('/nouvelle-annonce-1', 'SubmitAdvertController@postStep1Subjects');

            Route::get('/nouvelle-annonce-2', 'SubmitAdvertController@getStep2TitleAndLevels');
            Route::post('/nouvelle-annonce-2', 'SubmitAdvertController@postStep2TitleAndLevels');

            Route::get('/nouvelle-annonce-3', 'SubmitAdvertController@getStep3AddressAndTravel');
            Route::post('/nouvelle-annonce-3', 'SubmitAdvertController@postStep3AddressAndTravel');

            Route::get('/nouvelle-annonce-4', 'SubmitAdvertController@getStep4ContentAndExperience');
            Route::post('/nouvelle-annonce-4', 'SubmitAdvertController@postStep4ContentAndExperience');

            Route::get('/nouvelle-annonce-5', 'SubmitAdvertController@getStep5PriceAndConditions');
            Route::post('/nouvelle-annonce-5', 'SubmitAdvertController@postStep5PriceAndConditions');

            Route::get('/nouvelle-annonce-6', 'SubmitAdvertController@getStep6Picture');
            Route::post('/nouvelle-annonce-6', 'SubmitAdvertController@postStep6Picture');

            Route::get('/nouvelle-annonce-7', 'SubmitAdvertController@getStep7Publish');
            Route::post('/nouvelle-annonce-7', 'SubmitAdvertController@postStep7Publish');
        });


        // Edit Advert
        Route::get('/modifier-annonce-1/{advert_id}', 'EditAdvertController@editStep1');
        Route::post('/modifier-annonce-1/{advert_id}', 'EditAdvertController@postEditStep1');

        Route::get('/modifier-annonce-2/{advert_id}', 'EditAdvertController@editStep2');
        Route::post('/modifier-annonce-2/{advert_id}', 'EditAdvertController@postEditStep2');

        Route::get('/modifier-annonce-3/{advert_id}', 'EditAdvertController@editStep3');
        Route::post('/modifier-annonce-3/{advert_id}', 'EditAdvertController@postEditStep3');

        Route::get('/modifier-annonce-4/{advert_id}', 'EditAdvertController@editStep4');
        Route::post('/modifier-annonce-4/{advert_id}', 'EditAdvertController@postEditStep4');

        Route::get('/modifier-annonce-5/{advert_id}', 'EditAdvertController@editStep5');
        Route::post('/modifier-annonce-5/{advert_id}', 'EditAdvertController@postEditStep5');

        Route::get('/modifier-annonce-6/{advert_id}', 'EditAdvertController@editStep6');
        Route::post('/modifier-annonce-6/{advert_id}', 'EditAdvertController@postEditStep6');

        // Dashboard
        Route::get('/mon-compte', 'DashboardController@index');
        Route::get('/mon-compte/annonce-{advert_id}', 'DashboardController@editAdvert');
        Route::post('/hide-notification/{notification_id}', 'DashboardController@hideNotification');

        // Book a lesson
        Route::get('/mise-en-relation/{advert_id}', 'BookCourseController@bookLesson');
        Route::post('/reserver-un-cours', 'BookCourseController@postBookLesson');

        // Answer a booking
        Route::get('/demande/{booking_id}/repondre', 'BookCourseController@replyBookingRequest');
        Route::get('/demande/{booking_id}/{answer}', 'BookCourseController@replyBookingRequest');

        // Comments
        Route::get('/laisser-un-commentaire/{comment_id}', 'CommentsController@getCommentForm');
        Route::post('/laisser-un-commentaire', 'CommentsController@postComment');
    });

    Route::get('/{slug}', 'ListAdvertController@view');
});


