<?php
namespace App\Http\Controllers;


use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\RegisterStudentInterest;
use App\Models\SubjectsPerAdvert;
use App\Models\SubSubject;
use App\Models\UserRatings;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ListAdvertController extends Controller
{
    private $engine;

    public function __construct(SearchAdvertContract $engine)
    {
        $this->engine = $engine;
    }

    public function welcomeProfesseur()
    {
        return view('layouts.prof-accueil');
    }


    public function index()
    {
        $subsubjects        = implode(',', SubSubject::all()->pluck('name')->toArray());
        $selectedSubject    = null;
       // $latestAdverts      = $this->latestAdverts();
       // $popularSubjects    = $this->mostPopularSubjects();
        $notificationsCount = Notification::currentUserNotificationsCount();

        return view('layouts.index')->with(compact('subsubjects', 'selectedSubject', 'notificationsCount'));
    }

    public function registerStudentInterest(Request $request)
    {
        $spam = (!empty($request->input('location_city_lat'))) or (!empty($request->input('location_city_long')));

        if($spam == false){
            $inputs = $request->only(["city" , "subject" , "email", "lng", "lat", "loc_name"]);
            $interest = RegisterStudentInterest::create($inputs);
            $interest->save();
        }

        thanks('Nous avons enregistré vos préférences. Merci de votre aide !');

        return redirect()->back();
    }

    public function allAdverts()
    {
        $adverts         = Advert::liveAdverts(20);
        $subsubjects     = implode(',', SubSubject::all()->pluck('name')->toArray());
        $selectedSubject = null;

        return view('main.index')->with(compact('adverts', 'subsubjects', 'selectedSubject'));
    }

    public function searchByURL($subject, $city = null)
    {
        $data                  = new \stdClass();
        $subjectObject         = SubSubject::where('name', $subject)->first();
        $data->selectedSubject = $subject;
        $data->subsubjects     = implode(',', SubSubject::all()->pluck('name')->toArray());
        $data->subjectId       = $subjectObject->id ?? null;
        $data->city            = empty($city) ? null : $city;
        $coord                 = [];

        if($city)
        $coord = $this->geocode($city);

        if (count($coord)) {
            $data->lat = $coord[0];
            $data->lgn = $coord[1];
        }

        list($adverts, $distances) = $this->engine->search($data);

        return view('main.index')->with(
            [
                'adverts'         => $adverts,
                'subsubjects'     => $data->subsubjects,
                'selectedSubject' => $data->selectedSubject,
                'distances'       => $distances,
                'selectedCity'    => $data->city ?? null,
            ]
        );

    }

    //TODO TEST search location by radius
    public function search(Request $request)
    {
        $data                  = new \stdClass();
        $data->selectedSubject = $request->get('subject');
        $subject               = SubSubject::where('name', $data->selectedSubject)->first();

        if ($data->selectedSubject == null)
            return response()->json([]);

        $data->subsubjects    = implode(',', SubSubject::all()->pluck('name')->toArray());
        $data->subjectId      = $subject->id ?? null;
        $data->lat            = $request->get('lat') ?? null;
        $data->lgn            = $request->get('lng') ?? null;
        $data->radius         = $this->mapRadius($request->get('radius'))[0];
        $data->selectedRadius = $this->mapRadius($request->get('radius'))[1];
        $data->city           = explode(',', $request->get('city'))[0] ?? null;
        $data->gender         = $request->get('gender') ?? 'both';
        $data->sortBy         = $request->get('sortBy') ?? 'date';

        list($adverts, $distances) = $this->engine->search($data);

        $results = view('main.multipleAdvertPreview')
            ->with([
                       'adverts'         => $adverts,
                       'subsubjects'     => $data->subsubjects,
                       'selectedSubject' => $data->selectedSubject,
                       'distances'       => $distances,
                       'selectedCity'    => $data->city ?? null,
                       'radius'          => $data->radius ?? null,
                   ]
            )->render();

        return response()->json(
            [
                'params'    => $data,
                'count'     => $adverts->total(),
                'distances' => $distances,
                'results'   => $results,
            ]);
    }


    public function preview($slug)
    {
        $advert = Advert::findBySlug($slug);

        if($advert == NULL)
        {
            \App::abort(404);
        }

        $view = view('professeur.advert.view')->with(compact('advert'));

        if ($advert->published_at == NULL)
        {
            $view->with(['info' => "Cette annonce n'est pas encore publiée et n'est pas visible des élèves",
                        'thisIsAPreview' => true]);
        }

        return $view;
    }


    public function latestAdverts()
    {
        return Advert::whereNotNull('published_at')->whereNotNull('approved_at')->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function mostPopularSubjects(int $limit = 12)
    {
        $popularSubjects = SubjectsPerAdvert::selectRaw('subject_id, count(*) as count')
            ->groupBy('subject_id')
            ->orderBy('count', 'DESC')
            ->limit($limit)
            ->get()
            ->toArray();

        $s = SubSubject::selectRaw('name, parent_id')->whereIn('id', array_pluck($popularSubjects, 'subject_id'))->get()->toArray();
        $r = [];

        $icons = [
            1  => 'fa-graduation-cap',
            2  => 'fa-flask',
            3  => 'fa-line-chart',
            4  => 'fa-language',
            5  => 'fa-balance-scale',
            6  => 'fa-group',
            7  => 'fa-laptop',
            8  => 'fa-music',
            9  => 'fa-futbol-o',
            10 => 'fa-paint-brush',
            11 => 'fa-fort-awesome',
        ];
        foreach ($popularSubjects as $key => $value) {
            $r[] = array_merge(array_merge($value, $s[$key]), ['class' => $icons[$s[$key]['parent_id']]]);
        }
        return collect($r);
    }

    private function mapRadius(int $radius = null)
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

        return [null,
            null];
    }

    function geocode($address){

        // url encode the address
        $address = urlencode($address);

        // google map geocode api url
        $url = "http://maps.google.com/maps/api/geocode/json?address={$address}&amp;key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc";

        // get the json response
        $resp_json = file_get_contents($url);

        // decode the json
        $resp = json_decode($resp_json, true);

        // response status will be 'OK', if able to geocode given address
        if($resp['status']=='OK'){

            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];
            $formatted_address = $resp['results'][0]['formatted_address'];

            // verify if data is complete
            if($lati && $longi && $formatted_address){

                // put the data in the array
                $data_arr = array();

                array_push(
                    $data_arr,
                    $lati,
                    $longi,
                    $formatted_address
                );

                return [$lati, $longi];

            }else{
                return [];
            }

        }else{
            return [];
        }
    }
}
