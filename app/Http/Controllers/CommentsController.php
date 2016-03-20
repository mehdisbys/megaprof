<?php
namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentsController extends Controller
{

    public function studentCommentsOnProf(CommentRequest $request)
    {
        Comment::create(
            [
                'comment'       => $request->get('comment'),
                'student_id'    => \Auth::id(),
                'prof_id'       => $request->get('prof_id')
            ]);
    }
}
