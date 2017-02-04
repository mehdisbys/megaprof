<?php
namespace App\Http\Controllers;

use App\Events\ProfCommentedOnStudent;
use App\Events\StudentCommentedOnProf;
use App\Http\Requests\CommentRequest;
use App\Models\Advert;
use App\Models\Comment;
use App\Models\UserRatings;
use Illuminate\Support\Facades\Event;

class CommentsController extends Controller
{

    public function getCommentForm($commentId)
    {
        $comment = Comment::retrieve($commentId)->first();

        if (isset($comment) == false or $comment->comment != NULL) {
            return redirect('/mon-compte');
        }

        $advert  = Advert::find($comment->first()->advert->id);

        return view('comments.form')
            ->with(compact('comment', 'advert'));
    }

    public function postComment(CommentRequest $request)
    {
        $this->validate($request,
                        [
                            'comment' => 'required|min:30',
                            'rating'  => 'required|numeric|min:1|max:5',
                        ]);

        $comment = Comment::find($request->get('comment_id'));

        if ($comment == null)
            abort(404, 'Une erreur est survenue. Veuillez réessayer ultérieurement.');

        $ratings = UserRatings::updateUserRatings($comment->targetUser->id, $request->get('rating'));

        if ($comment->comment != NULL) {
            return redirect('/mon-compte');
        }

        $comment->comment = $request->get('comment');
        $comment->stars   = $request->get('rating');
        $comment->save();

        if ($comment->iWasTheProf()) {
            Event::fire(new ProfCommentedOnStudent($comment));
        } else
            Event::fire(new StudentCommentedOnProf($comment));

        return redirect()->to('/mon-compte');
    }
}
