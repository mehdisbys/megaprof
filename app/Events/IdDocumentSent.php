<?php
namespace App\Events;


use App\Models\IdDocument;
use App\Models\User;
use Illuminate\Queue\SerializesModels;

class IdDocumentSent extends Event
{
    use SerializesModels;

    public $user;
    public $idDocument;

    public function __construct(User $user, IdDocument $idDocument)
    {
        $this->user        = $user;
        $this->idDocument = $idDocument;
    }

}