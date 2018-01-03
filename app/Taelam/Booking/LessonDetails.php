<?php


namespace App\Taelam\Booking;


use App\Taelam\Booking\Exceptions\InvalidLessonDetailsArguments;
use Carbon\Carbon;

class LessonDetails
{

    private $prof_user_id;
    private $advert_id;
    private $presentation;
    private $date;
    private $location;
    private $client;
    private $mobile;
    private $addresse;
    private $pick_a_date;
    private $pick_a_location;
    private $dobyear;
    private $dobmonth;
    private $dobday;

    /**
     * LessonDetails constructor.
     * @param $prof_user_id
     * @param $advert_id
     * @param $presentation
     * @param $date
     * @param $location
     * @param $client
     * @param $mobile
     * @param $addresse
     * @param $pick_a_date
     * @param $pick_a_location
     * @param $dobyear
     * @param $dobmonth
     * @param $dobday
     */
    public function __construct($prof_user_id, $advert_id, $presentation, $date, $location, $client, $mobile, $addresse, $pick_a_date, $pick_a_location, $dobyear, $dobmonth, $dobday)
    {
        $this->prof_user_id    = $prof_user_id;
        $this->advert_id       = $advert_id;
        $this->presentation    = $presentation;
        $this->date            = $date;
        $this->location        = $location;
        $this->client          = $client;
        $this->mobile          = $mobile;
        $this->addresse        = $addresse;
        $this->pick_a_date     = $pick_a_date;
        $this->pick_a_location = $pick_a_location;
        $this->dobyear         = $dobyear;
        $this->dobmonth        = $dobmonth;
        $this->dobday          = $dobday;
    }

    public static function fromArray(array $details)
    {
        $lessonDetails = null;
        try {
            $lessonDetails = new self(
                $details['prof_user_id'],
                $details['advert_id'],
                $details['presentation'],
                $details['date'],
                $details['location'],
                $details['client'],
                $details['mobile'] ?? NULL,
                $details['addresse'] ?? NULL,
                $details['pick_a_date'],
                $details['pick_a_location'],
                $details['dobyear'] ?? NULL,
                $details['dobmonth'] ?? NULL,
                $details['dobday'] ?? NULL);

        } catch (\Exception $e) {
            throw new InvalidLessonDetailsArguments($e->getMessage());
        }
        return $lessonDetails;
    }

    /**
     * @return mixed
     */
    public function getProfUserId()
    {
        return $this->prof_user_id;
    }

    /**
     * @param mixed $dobyear
     */
    public function setDobYear($dobyear)
    {
        $this->dobyear = $dobyear;
    }


    public function getStudentAge(): int
    {
        if ($this->dobyear and $this->dobmonth and $this->dobday) {
            $dateOfBirth = Carbon::createFromDate($this->dobyear, $this->dobmonth, $this->dobday);
            return $dateOfBirth->age;
        }
        return 18;
    }

    public function getStudentBirthdate(): string
    {
        return implode('/', [$this->dobyear, $this->dobmonth, $this->dobday]);

    }

    public function toArray(): array
    {
        return
            [
                'prof_user_id'    => $this->prof_user_id,
                'advert_id'       => $this->advert_id,
                'presentation'    => $this->presentation,
                'date'            => $this->date,
                'location'        => $this->location,
                'client'          => $this->client,
                'mobile'          => $this->mobile,
                'addresse'        => $this->addresse,
                'pick_a_date'     => $this->pick_a_date,
                'pick_a_location' => $this->pick_a_location,
                'birthdate'       => $this->getStudentBirthdate()
            ];
    }
}