<?php


namespace App\Http\Requests;


class BookLessonUnregistered extends Request
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
        return \Config::get('validation.BookLessonUnregistered');
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Veuillez entrer votre prénom',
            'lastname.required'  => 'Veuillez entrer votre nom de famille',
            'email.required'     => 'Veuillez entrer votre email',
            'email.email'        => 'Veuillez entrer une addresse email valide',
            'email.unique'       => 'Erreur cet email est déjà associé à un compte',
            'password.required'  => 'Veuillez entrer un mot de passe',
            'password.min'       => 'Le mot de passe doit comprendre 5 caractères au minimum',
            'dobday.required'    => 'Votre jour de naissance est requis',
            'dobmonth.required'  => 'Votre mois de naissance est requis',
            'dobyear.required'   => 'Votre année de naissance est requise',

        ];
    }

}