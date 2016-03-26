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
            'view'   => ['create' => 'professeur.advert.createStep1Subjects'],
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
            'view'   => ['create' => 'professeur.advert.createStep1Subjects'],
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
            'view'   => ['create' => 'professeur.advert.createStep1Subjects'],
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
];