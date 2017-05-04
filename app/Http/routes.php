<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {

    Route::get('/faq', function () {
        return view('main.faq');
    });

    Route::get('/cgu', function () {
        return view('main.cgu');
    });

    Route::get('/blog/{slug}', 'ArticleController@view');
    Route::get('/blog/', 'ArticleController@index');

    Route::post('/contact', 'ContactEmailController@postContact');

//Lancement
    Route::get('/professeur', 'ListAdvertController@welcomeProfesseur');

//Social
    Route::get('/redirect', 'SocialAuthController@redirect');
    Route::get('/callback', 'SocialAuthController@callback');

//Main Page
    Route::get('/', 'ListAdvertController@index');
    Route::post('/student', 'ListAdvertController@registerStudentInterest');
    Route::get('/annonces', 'ListAdvertController@allAdverts');
    Route::get('/annonces/{subject}/{town}', 'ListAdvertController@searchByURL');
    Route::get('/annonces/{subject}', 'ListAdvertController@searchByURL');

    Route::post('/search', 'ListAdvertController@search');

    // Avatar
    Route::get('/avatar/{user_id}', 'AvatarController@getAvatar');

// Signup
    Route::get('inscription', 'SignupController@getSignup');
    Route::post('inscription', 'SignupController@candidateSignup');

// Confirm
    Route::get('register/confirm/{code}', 'SignupController@confirmEmail');

// Signing in
    Route::get('login', 'SessionsController@login');
    Route::post('login', 'SessionsController@postLogin');
    Route::get('logout', 'SessionsController@logout');

    // Password Reset
    Route::get('reset_password', 'SignupController@resetPasswordForm');
    Route::post('reset_password', 'SignupController@resetPassword');
    Route::get('reset_token/{token}', 'SignupController@resetPasswordSecondForm');
    Route::post('reset/try', 'SignupController@tryResettingPassword');

    Route::get('captcha', 'CaptchaController@generate');

    Route::get('signaler/{slug}', 'FlaggedAdvertsController@getForm');
    Route::post('signaler', 'FlaggedAdvertsController@postForm');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/avatar_dashboard/{user_id}', 'AvatarController@getDefaultAvatar');

        Route::post('/avatar', 'AvatarController@saveAvatar');

        Route::group(['middleware' => ['afterAdvert']], function () {

            Route::get('/nouvelle-annonce-1', 'SubmitAdvertController@getStep1Subjects');
            Route::post('/nouvelle-annonce-1', 'SubmitAdvertController@postStep1Subjects');

            Route::get('/nouvelle-annonce-2', 'SubmitAdvertController@getStep2TitleAndLevels')->middleware('revalidate');
            Route::post('/nouvelle-annonce-2', 'SubmitAdvertController@postStep2TitleAndLevels');

            Route::get('/nouvelle-annonce-3', 'SubmitAdvertController@getStep3AddressAndTravel')->middleware('revalidate');
            Route::post('/nouvelle-annonce-3', 'SubmitAdvertController@postStep3AddressAndTravel');

            Route::get('/nouvelle-annonce-4', 'SubmitAdvertController@getStep4ContentAndExperience')->middleware('revalidate');
            Route::post('/nouvelle-annonce-4', 'SubmitAdvertController@postStep4ContentAndExperience');

            Route::get('/nouvelle-annonce-5', 'SubmitAdvertController@getStep5PriceAndConditions')->middleware('revalidate');
            Route::post('/nouvelle-annonce-5', 'SubmitAdvertController@postStep5PriceAndConditions');

            Route::get('/nouvelle-annonce-6', 'SubmitAdvertController@getStep6Picture')->middleware('revalidate');
            Route::post('/nouvelle-annonce-6', 'SubmitAdvertController@postStep6Picture');

            Route::get('/nouvelle-annonce-7', 'SubmitAdvertController@getStep7Publish')->middleware('revalidate');
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
        Route::get('/modifier-annonce-7/{advert_id}', 'EditAdvertController@editStep7');

        Route::get('/desactiver-annonce/{advert_id}', 'EditAdvertController@deactivateAdvert');
        Route::get('/supprimer-annonce/{advert_id}', 'EditAdvertController@deleteAdvert');
        Route::get('/activer-annonce/{advert_id}', 'EditAdvertController@activateAdvert');

        Route::get('/preview/{slug}', 'ListAdvertController@preview');


        // Dashboard
        Route::get('/mon-compte', 'DashboardController@index');
        Route::get('/mon-compte/annonce-{advert_id}', 'DashboardController@editAdvert');
        Route::post('/hide-notification/{notification_id}', 'DashboardController@hideNotification');
        Route::post('/editer-profil', 'DashboardController@updateProfile');
        Route::get('/completer-profil', 'DashboardController@completeProfile');

        // Book a lesson
        Route::get('/mise-en-relation/{slug}', 'BookCourseController@bookLesson');
        Route::post('/reserver-un-cours', 'BookCourseController@postBookLesson');

        // Answer a booking
        Route::get('/demande/{booking_id}/repondre', 'BookCourseController@replyBookingRequest');
        Route::get('/demande/{booking_id}/{answer}', 'BookCourseController@replyBookingRequest');

        // Comments
        Route::get('/laisser-un-commentaire/{comment_id}', 'CommentsController@getCommentForm');
        Route::post('/laisser-un-commentaire', 'CommentsController@postComment');

        Route::get('/carte-identite', 'IDdocumentController@userDownloadsOwnId');
        Route::get('/mon-diplome', 'DegreedocumentController@userDownloadsOwnId');
        Route::get('/notifications', 'DashboardController@getNotificaticationCount');


        Route::group(['middleware' => ['isAdmin']], function () {
            Route::get('/admin', 'AdminController@adminDashboard');
            Route::get('/admin/lister-utilisateurs', 'AdminController@listAllUsers');

            Route::get('/admin/blog', 'ArticleController@getCreate');
            Route::post('/admin/blog', 'ArticleController@postCreate');
            Route::get('/admin/blog/edit/{slug}', 'ArticleController@getEdit');
            Route::post('/admin/blog/edit/{slug}', 'ArticleController@postEdit');

            Route::get('/download-id/{documentId}', 'IDdocumentController@downloadIdDocument');

            Route::get('/suspendre-annonce/{slug}', 'FlaggedAdvertsController@suspendAdvert');
            Route::get('/login-as/{userId}', 'SessionsController@loginAs');
            Route::get('/valider-utilisateurs', 'IDdocumentController@listAllIdDocumentsWaitingForApproval');
            Route::get('/validate-user-identification/{documentId}', 'IDdocumentController@validateDocumentId');
            Route::get('/annonces-en-attente-de-moderation', 'AdminController@listWaitingForApprovalAdverts');
            Route::get('/annonces-validees', 'AdminController@listAcceptedAdverts');
            Route::get('/annonces-brouillons', 'AdminController@listArchivedAdverts');
            Route::post('/rejeter-annonce/{advert_id}', 'AdminController@advertRejected');
            Route::get('/validate-advert/{advert_id}', 'AdminController@advertAccepted');
            Route::get('/envoyer-les-emails', 'AdminController@fixEmails');

        });
    });

    Route::get('/{slug}', 'ViewController@view');
});


