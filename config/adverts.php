<?php
return [
    'getStep1Subjects' =>
        [
            'view'   => ['create' => 'professeur.advert.createStep1Subjects'],
            'args'   => ['step' => 1],
            'action' => 'view'
        ],

    'postStep1Subjects' =>
        [
            'args'   => ['step' => 1],
            'action' => 'redirect',
            'next'   => 'SubmitAdvertController@getStep2TitleAndLevels'
        ],

    'getStep2TitleAndLevels' =>
        [
            'view'   => ['create' => 'professeur.advert.createStep2TitleAndLevels'],
            'args'   => ['step' => 2],
            'action' => 'view'
        ],

    'postStep2TitleAndLevels' =>
        [
            'args'   => ['step' => 2],
            'action' => 'redirect',
            'next'   => 'SubmitAdvertController@getStep3AddressAndTravel'
        ],

    'getStep3AddressAndTravel' =>
        [
            'view'   => ['create' => 'professeur.advert.createStep3AddressAndTravel'],
            'args'   => ['step' => 3],
            'action' => 'view'
        ],

    'postStep3AddressAndTravel' =>
        [
            'args'   => ['step' => 3],
            'action' => 'redirect',
            'next'   => 'SubmitAdvertController@getStep4ContentAndExperience'
        ],

    'getStep4ContentAndExperience' =>
        [
            'view'   => ['create' => 'professeur.advert.createStep4ContentAndExperience'],
            'args'   => ['step' => 4],
            'action' => 'view'
        ],

    'postStep4ContentAndExperience' =>
        [
            'args'   => ['step' => 4],
            'action' => 'redirect',
            'next'   => 'SubmitAdvertController@getStep5PriceAndConditions'
        ],

    'getStep5PriceAndConditions' =>
        [
            'view'   => ['create' => 'professeur.advert.createStep5PriceAndConditions'],
            'args'   => ['step' => 5],
            'action' => 'view'
        ],

    'postStep5PriceAndConditions' =>
        [
            'args'   => ['step' => 5],
            'action' => 'redirect',
            'next'   => 'SubmitAdvertController@getStep6Picture'
        ],

    'getStep6Picture' =>
        [
            'view'   => ['create' => 'professeur.advert.createStep6Picture'],
            'args'   => ['step' => 6],
            'action' => 'view'
        ],

    'postStep6Picture' =>
        [
            'args'   => ['step' => 6],
            'action' => 'redirect',
            'next'   => 'SubmitAdvertController@getStep7Publish'
        ],

    'getStep7Publish' =>
        [
            'view'   => ['create' => 'professeur.advert.createStep7'],
            'args'   => ['step' => 7],
            'action' => 'view'
        ],

    'postStep7Publish' =>
        [
            'args'   => ['step' => 7],
            'action' => 'redirect',
            'next'   => 'DashboardController@index'
        ],
];