<?php


return [
    'signup' => [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    ]
];