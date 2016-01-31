<?php
namespace App\Http\Requests;


class BookLesson extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO check a professor isnt trying to apply to its own advert
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return \Config::get('validation.BookLesson');
    }
}