<?php
namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentsController extends Controller
{

    public function getCommentForm($comment_id)
    {
        $comment = Comment::find($comment_id);

        return view('comment')->with(compact('comment'));
    }

    public function postComment(CommentRequest $request)
    {
        $comment = Comment::find($request->get('comment_id'));

        if ($comment == null)
            abort(404, 'Une erreur est survenue');

        $comment->comment = $request->get('comment');

        $comment->save();
    }
}
