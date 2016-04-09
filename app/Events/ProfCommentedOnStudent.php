<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Queue\SerializesModels;

class ProfCommentedOnStudent extends Event
{
    use SerializesModels;

    public $comment;

    /**
     * ProfCommentedOnStudent constructor.
     * @param Comment $comment
     */public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}
