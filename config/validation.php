<?php

return [
    'AdvertCreateStep2' =>
        [
            'title' => 'required|max:128',
        ],

    'BookLesson' =>
        [
            'prof_user_id'      => 'required',
            'advert_id'         => 'required',
            'presentation'      => 'required',
            'date'              => 'required',
            'location'          => 'required',
            'client'            => 'required',
            'birthdate'         => 'required',
            'mobile'            => 'required',
            'addresse'          => 'required',
            'pick_a_date'       => 'required_if:date,custom',
            'pick_a_location'   => 'required_if:location,custom'
        ],

    'CommentProf' =>
        [
            'content'           => 'required|max:255',
            'prof_id'           => 'required'
        ]

];