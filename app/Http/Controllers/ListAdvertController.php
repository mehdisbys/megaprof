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
        return view('layouts.master');
    }

    public function allAdverts()
    {
        $adverts = Advert::liveAdverts();

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
        $subject         = SubSubject::where('name', $selectedSubject)->first();

        if ($subject == null)
            return view('main.index')->with(['adverts' => []])->with(compact('subsubjects', 'selectedSubject'));

        $data->subject = $subject->id;
        $data->lat     = $request->get('lat');
        $data->lgn     = $request->get('lng');
        $data->radius  = $this->mapRadius($request->get('radius'));
        $data->city    = explode(',', $request->get('location'))[0];

        $adverts       = $this->engine->search($data)->get();

        return view('main.index')
            ->with(compact('adverts', 'subsubjects', 'selectedSubject'))
            ->with(['selectedCity' => $data->city, 'radius' => $data->radius]);
    }

    public function view($slug)
    {
        $advert   = Advert::findBySlugOr404($slug);
        $comments = Comment::where(['advert_id' => $advert->id])->whereNotNull('comment')->get();

        return view('professeur.advert.view')->with(compact('advert', 'comments'));
    }

    private function mapRadius(int $radius = null): int
    {
        $map = [
          1 => 5,
          2 => 10,
          3 => 20,
          4 => 1
        ];

        if (isset($map[$radius]))
            return $map[$radius];

        return 1;
    }
}