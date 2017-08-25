<?php


namespace App\Listeners;


use App\Events\AdvertWasAcceptedByAdmin;
use App\Mail\InstantMatchAdvertMailable;
use App\Models\RegisterStudentInterest;
use Illuminate\Support\Facades\Mail;

class InstantMatchAdvertsRegisteredUserInterests
{


    public function handle(AdvertWasAcceptedByAdmin $event)
    {
        $subjects = $event->advert->subjectsPerAd;
        $city     = $event->advert->getLocationText();


        $subjectsId = $subjects->map(function ($item, $key) {
            return $item->subject_id;
        });

        $students = RegisterStudentInterest::whereIn('subjectId', $subjectsId->toArray())->where(['city' => $city])->get();

        foreach ($students as $student) {

            Mail::to($student->email)->queue(new InstantMatchAdvertMailable($event, $student));
        }
    }

}