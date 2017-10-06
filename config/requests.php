<?php


return [
    'signup' => [
        'firstname'             => 'required',
        'lastname'              => 'required',
        'email'                 => 'required|email|unique:users',
        'password'              => 'required|min:5',
        'cgu'                   => 'required|accepted',
    ],
];