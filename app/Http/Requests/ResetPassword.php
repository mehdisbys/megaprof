<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Config;

class ResetPassword extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Config::get('validation.resetPasswordForm');

    }

    public function messages()
    {
        return [
            'password.required'              => 'Veuillez entrer un mot de passe',
            'password.min'                   => 'Le mot de passe doit comprendre 5 caractères au minimum',
            'password.confirmed'             => 'Le mot de passe et la confirmation du mot de passe sont différents',
            'password_confirmation.required' => 'La confirmation du mot de passe est requise',
        ];
    }

}
