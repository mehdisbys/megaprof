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
];