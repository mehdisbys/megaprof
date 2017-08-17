<?php


namespace App\Events;


class UserDidASearch
{

    public $count;
    public $subjectId;
    public $subjectName;
    public $location;

    /**
     * UserDidASearch constructor.
     * @param $count
     * @param $subjectId
     * @param $subjectName
     * @param $location
     */
    public function __construct($count, $subjectId, $subjectName, $location)
    {
        $this->count       = $count;
        $this->subjectId   = $subjectId;
        $this->subjectName = $subjectName;
        $this->location    = $location;
    }


}