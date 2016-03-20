<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Input;
use App\Models\Comment;

class CommentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $id = Input::get('comment_id');

        return Comment::resourceBelongsToLoggedUser($id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return \Config::get('validation.CommentProf');
    }
}
