<?php

return [
    'AdvertCreateStep2' =>
        [
            'title' => 'required|max:128',
        ],

    'BookLesson' =>
        [
            'prof_user_id'    => 'required',
            'advert_id'       => 'required',
            'presentation'    => 'required',
            'date'            => 'required',
            'location'        => 'required',
            'client'          => 'required',
            'pick_a_date'     => 'required_if:date,custom',
            'pick_a_location' => 'required_if:location,custom',
        ],

    'BookLessonUnregistered' =>
        [
            'prof_user_id'    => 'required',
            'advert_id'       => 'required',
            'presentation'    => 'required',
            'date'            => 'required',
            'location'        => 'required',
            'client'          => 'required',
            'dobday'          => 'required',
            'dobmonth'        => 'required',
            'dobyear'         => 'required',
            'mobile'          => 'required',
            'addresse'        => 'required',
            'pick_a_date'     => 'required_if:date,custom',
            'pick_a_location' => 'required_if:location,custom',
            'firstname'       => 'required',
            'email'           => 'required|email|unique:users',
            'password'        => 'required|min:5',
        ],

    'CommentProf' =>
        [
            'comment'    => 'required',
            'comment_id' => 'required',
        ],

    'resetPasswordEmail' =>

        [
            'email' => 'required|email',
        ],

    'resetPasswordForm' => [
        'token'                 => 'required',
        'password'              => 'required|min:5|confirmed',
        'password_confirmation' => 'required|min:5',
    ],
];