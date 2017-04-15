<?php


return [
    'signup' => [
        'firstname'             => 'required',
        'lastname'              => 'required',
        'email'                 => 'required|email|unique:users',
        'password'              => 'required|confirmed|min:5',
        'password_confirmation' => 'required',
        'cgu'                   => 'required|accepted',
    ],
];