<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Config;

class ResetPasswordEmail extends Request
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
        return Config::get('validation.resetPasswordEmail');
    }

    public function messages()
    {
        return [
            'email.required'                 => 'Veuillez entrer votre email',
            'email.email'                    => 'Veuillez entrer une addresse email valide',
        ];
    }
}