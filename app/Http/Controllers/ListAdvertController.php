<?php
namespace App\Http\Controllers;


use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;
use App\Models\Comment;
use App\Models\SubSubject;
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
        return view('layouts.index');
    }

    public function allAdverts()
    {
        $adverts = Advert::liveAdverts(20);

        $subsubjects = implode(',', SubSubject::all()->pluck('name')->toArray());

        $selectedSubject = null;

        return view('main.index')->with(compact('adverts', 'subsubjects', 'selectedSubject'));
    }

    //TODO TEST search location by radius
    public function search(Request $request)
    {
        $subsubjects = implode(',', SubSubject::all()->pluck('name')->toArray());

        $data            = new \stdClass();
        $selectedSubject = $request->get('subject');
        //TODO send subject id directly
        $subject         = SubSubject::where('name', $selectedSubject)->first();
        $city            = explode(',', $request->get('city'))[0];

        if ($subject == null) return response()->json([]);

        $data->selectedSubject = $selectedSubject;
        $data->subject         = $subject->id;
        $data->lat             = $request->get('lat');
        $data->lgn             = $request->get('lng');
        $data->radius          = $this->mapRadius($request->get('radius'))[0];
        $data->selectedRadius  = $this->mapRadius($request->get('radius'))[1];
        $data->city            = empty($city) ? null : $city;
        $data->gender          = $request->get('gender');

        list($adverts, $distances) = $this->engine->search($data);

        $results = view('main.multipleAdvertPreview')
            ->with(compact('adverts', 'subsubjects', 'selectedSubject', 'distances'))
            ->with(['selectedCity' => $data->city, 'radius' => $data->radius])->render();

        return response()->json(
            [
                'params'    => $data,
                'count'     => count($adverts) . " professeurs correspondent à vos critères.",
                'results'   => $results,
                'distances' => $distances
            ]);
    }

    public function view($slug)
    {
        $advert   = Advert::findBySlugOr404($slug);
        $comments = Comment::where(['advert_id' => $advert->id])->whereNotNull('comment')->get();

        return view('professeur.advert.view')->with(compact('advert', 'comments'));
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
