<?php

namespace App\Search;

use App\Models\SubSubject;

class SearchArguments
{

    private $selectedSubject;
    private $subject;
    private $subsubjects;
    private $subjectId;
    private $lat;
    private $lgn;
    private $radius;
    private $selectedRadius;
    private $city;
    private $gender;
    private $sortBy;

    /**
     * SearchArguments constructor.
     * @param $selectedSubject
     * @param $subject
     * @param $subsubjects
     * @param $subjectId
     * @param $lat
     * @param $lgn
     * @param $radius
     * @param $selectedRadius
     * @param $city
     * @param $gender
     * @param $sortBy
     */
    public function __construct($selectedSubject, $subject, $subsubjects, $subjectId, $lat, $lgn, $radius, $selectedRadius, $city, $gender, $sortBy)
    {
        $this->selectedSubject = $selectedSubject;
        $this->subject         = $subject;
        $this->subsubjects     = $subsubjects;
        $this->subjectId       = $subjectId;
        $this->lat             = $lat;
        $this->lgn             = $lgn;
        $this->radius          = $radius;
        $this->selectedRadius  = $selectedRadius;
        $this->city            = $city;
        $this->gender          = $gender;
        $this->sortBy          = $sortBy;
    }

    /**
     * @return mixed
     */
    public function getSelectedSubject()
    {
        return $this->selectedSubject;
    }

    /**
     * @param mixed $selectedSubject
     */
    public function setSelectedSubject($selectedSubject)
    {
        $this->selectedSubject = $selectedSubject;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getSubjectName()
    {
        return $this->subject->name;
    }

    /**
     * @return mixed
     */
    public function getSubsubjects()
    {
        return $this->subsubjects;
    }

    /**
     * @param mixed $subsubjects
     */
    public function setSubsubjects($subsubjects)
    {
        $this->subsubjects = $subsubjects;
    }

    /**
     * @return mixed
     */
    public function getSubjectId()
    {
        return $this->subjectId;
    }

    /**
     * @param mixed $subjectId
     */
    public function setSubjectId($subjectId)
    {
        $this->subjectId = $subjectId;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLgn()
    {
        return $this->lgn;
    }

    /**
     * @param mixed $lgn
     */
    public function setLgn($lgn)
    {
        $this->lgn = $lgn;
    }

    /**
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param mixed $radius
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return mixed
     */
    public function getSelectedRadius()
    {
        return $this->selectedRadius;
    }

    /**
     * @param mixed $selectedRadius
     */
    public function setSelectedRadius($selectedRadius)
    {
        $this->selectedRadius = $selectedRadius;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getSortBy()
    {
        return $this->sortBy;
    }

    /**
     * @param mixed $sortBy
     */
    public function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;
    }


    public function toArray() :array
    {
        return [
            'selectedSubject' => $this->selectedSubject,
            'subject'         => $this->subject,
            'subsubjects'     => $this->subsubjects,
            'subjectId'       => $this->subjectId,
            'lat'             => $this->lat,
            'lgn'             => $this->lgn,
            'radius'          => $this->radius,
            'selectedRadius ' => $this->selectedRadius,
            'city'            => $this->city,
            'gender'          => $this->gender,
            'sortBy'          => $this->sortBy,
        ];
    }


    public static function fromArray(array $request) : self
    {
        $subject = null;

        if (isset($request['subject']))
            $subject = SubSubject::where('name', str_replace('-', ' ', $request['subject']))->first();

        else
            $subject = SubSubject::find($request['subjectId'] ?? null);

        $data = new self($request['subject'] ?? $subject->name,
                         $subject,
                         implode(',', SubSubject::all()->pluck('name')->toArray()),
                         $subject->id ?? null,
                         $request['lat'] ?? null,
                         $request['lng'] ?? null,
                         self::mapRadius($request['radius'] ?? null)[0],
                         self::mapRadius($request['radius'] ?? null)[1],
                         explode(',', $request['city'] ?? '')[0] ?? null,
                         $request['gender'] ?? 'both',
                         $request['sortBy'] ?? 'date');

        $coord = [];

        if ($data->getCity() and $data->getLgn() == NULL)
            $coord = geocode($data->getCity());

        if (count($coord)) {
            $data->setLat($coord[0]);
            $data->setLgn($coord[1]);
        }

        return $data;
    }

    private static function mapRadius(int $radius = null)
    {
        $map = [
            1 => [5,
                  '5 km'],
            2 => [10,
                  '10 km'],
            3 => [20,
                  '20 km'],
            4 => [1,
                  'à domicile'],
        ];

        if (isset($map[$radius]))
            return $map[$radius];

        return [null, null];
    }
}