<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Config;

class Signup extends Request
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
        return Config::get('requests.signup');
    }

    public function messages()
    {
        return [
            'firstname.required'             => 'Veuillez entrer votre prénom',
            'lastname.required'              => 'Veuillez entrer votre nom de famille',
            'email.required'                 => 'Veuillez entrer votre email',
            'email.email'                    => 'Veuillez entrer une addresse email valide',
            'email.unique'                   => 'Erreur cet email est déjà associé à un compte',
            'password.required'              => 'Veuillez entrer un mot de passe',
            'password.min'                   => 'Le mot de passe doit comprendre 5 caractères au minimum',
            'password.confirmed'             => 'Le mot de passe et la confirmation du mot de passe sont différents',
            'password_confirmation.required' => 'La confirmation du mot de passe est requise',
            'cgu.accepted'                   => 'Veuillez accepter les Conditions d\'utilisation avant de pouvoir créer votre compte',
        ];
    }
}
