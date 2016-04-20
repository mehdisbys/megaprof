<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Queue\SerializesModels;

class StudentCommentedOnProf extends Event
{
    use SerializesModels;

    private $comment;

    /**
     * ProfCommentedOnStudent constructor.
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}
