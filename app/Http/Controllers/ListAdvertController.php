<?php
namespace App\Http\Controllers;


use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;
use App\Models\Comment;
use App\Models\SubSubject;
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

        return view('layouts.index')->with(compact('subsubjects', 'selectedSubject'));
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

       // dd($distances);

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
        $sortBy                = $request->get('sortBy') ?? 'date';
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
        $data->gender         = $request->get('gender');

        list($adverts, $distances) = $this->engine->search($data);

        if($sortBy === 'date'){
            $adverts = array_sort($adverts, function ($value){ return Carbon::createFromFormat("Y-m-d H:i:s",$value->updated_at)->timestamp;});
        }

        if($sortBy === 'price') {
            $adverts = array_sort($adverts, function ($value){ return $value->price;});
        }

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
                'count'     => count($adverts) . " professeurs correspondent à vos critères.",
                'distances' => $distances,
                'results'   => $results,
            ]);
    }


    public function view($slug)
    {
        $advert         = Advert::findBySlugOr404($slug);
        $comments       = Comment::commentsForAdvertId($advert->id);
        $similarAdverts = $this->findSimilarAdverts($advert);

        return view('professeur.advert.view')->with(compact('advert', 'comments', 'similarAdverts'));
    }

    public function findSimilarAdverts(Advert $advert)
    {
        $data = new \stdClass();

        $data->subjectId = $advert->getSubjectId();
        $data->lat       = $advert->location_lat;
        $data->long      = $advert->location_long;
        $data->radius    = null;

        list($adverts, $distances) = $this->engine->search($data);
        return $adverts;
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
