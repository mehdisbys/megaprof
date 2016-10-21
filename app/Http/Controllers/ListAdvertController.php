<?php
namespace App\Http\Controllers;


use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;
use App\Models\Comment;
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

    public function index()
    {
        $subsubjects = implode(',', SubSubject::all()->pluck('name')->toArray());
        $selectedSubject = null;
        $latestAdverts = $this->latestAdverts();
        $popularSubjects = $this->mostPopularSubjects();

        return view('layouts.index')->with(compact('subsubjects', 'selectedSubject', 'latestAdverts', 'popularSubjects'));
    }

    public function allAdverts()
    {
        $adverts = Advert::liveAdverts(20);
        $subsubjects = implode(',', SubSubject::all()->pluck('name')->toArray());
        $selectedSubject = null;

        return view('main.index')->with(compact('adverts', 'subsubjects', 'selectedSubject'));
    }

    public function searchByURL($subject, $city = null)
    {
        $data                  = new \stdClass();
        $data->selectedSubject = SubSubject::where('name', $subject)->first();
        $data->subsubjects     = implode(',', SubSubject::all()->pluck('name')->toArray());
        $data->subjectId       = $data->selectedSubject->id ?? null;
        $data->city            = empty($city) ? null : $city;

        // TODO update this to use the world_cities_database
        // Casablanca coordinates default for now
        $data->lat = 33.5914950;
        $data->lgn = -7.6012452;

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
        $data->subjectId      = $subject->id;
        $data->lat            = $request->get('lat') ?? 33.5914950 ;
        $data->lgn            = $request->get('lng') ?? -7.6012452;
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
                       'radius'          => $data->radius ?? null
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


    public function view($slug)
    {
        $advert         = Advert::findBySlugOr404($slug);
        $comments       = Comment::commentsForAdvertId($advert->id);
        $similarAdverts = $this->findSimilarAdverts($advert);
        $ratings = UserRatings::where(['user_id' => $advert->user->id])->first();

        return view('professeur.advert.view')->with(compact('advert', 'comments', 'similarAdverts', 'ratings'));
    }

    public function findSimilarAdverts(Advert $advert)
    {
        $data = new \stdClass();

        $data->subjectId = $advert->getSubjectId();
        $data->lat       = $advert->location_lat;
        $data->lgn      = $advert->location_long;
        $data->radius    = null;

        Advert::paginateCount(5);
        list($adverts, $distances) = $this->engine->search($data);
        return $adverts;
    }

    public function latestAdverts()
    {
        return Advert::orderBy('created_at','DESC')->paginate(5);
    }

    public function mostPopularSubjects(int $limit = 10)
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
          1 => [5, '5 km'],
          2 => [10,'10 km'],
          3 => [20,'20 km'],
          4 => [1,'à domicile']
        ];

        if (isset($map[$radius]))
            return $map[$radius];

        return [null,null];
    }
}
