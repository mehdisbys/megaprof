<?php
namespace App\Http\Controllers;

use App\Events\ProfCommentedOnStudent;
use App\Events\StudentCommentedOnProf;
use App\Http\Requests\CommentRequest;
use App\Models\Advert;
use App\Models\Comment;
use Illuminate\Support\Facades\Event;

class CommentsController extends Controller
{

    public function getCommentForm($commentId)
    {
        $comment = Comment::retrieve($commentId)->first();
        $advert  = Advert::find($comment->first()->advert->id);

        return view('comments.form')
            ->with(compact('comment', 'advert'));
    }

    public function postComment(CommentRequest $request)
    {
        $comment = Comment::find($request->get('comment_id'));

        if ($comment == null)
            abort(404, 'Une erreur est survenue');

        //TODO comment can only be set once
        $comment->comment = $request->get('comment');
        $comment->save();

        if ($comment->iWasTheProf()) {
            Event::fire(new ProfCommentedOnStudent($comment));
        }
        else
            Event::fire(new StudentCommentedOnProf($comment));

        return redirect()->to('/mon-compte');
    }
}
