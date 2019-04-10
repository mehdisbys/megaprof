<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Notification;
use App\Models\RegisterStudentInterest;
use App\Models\SubjectsPerAdvert;
use App\Models\SubSubject;
use App\Search\Search;
use App\Search\SearchArguments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListAdvertController extends Controller
{

    public function welcomeProfesseur()
    {
        return view('layouts.prof-accueil');
    }


    public function index()
    {
        $this->listAdvertPerCities();
        $subsubjects = implode(',', SubSubject::all()->pluck('name')->toArray());
        $selectedSubject = null;
        $latestAdverts = $this->latestAdverts();
        $frenchAdverts = $this->getLatestAdvertsPerSubjectID(41);
        $englishAdverts = $this->getLatestAdvertsPerSubjectID(90);
        $popularSubjects = $this->mostPopularSubjects();
        $notificationsCount = Notification::currentUserNotificationsCount();

        return view('layouts.index')->with(get_defined_vars());
    }

    public function listAdvertPerCities()
    {
        $adverts = DB::table('adverts')
            ->selectRaw(DB::raw(("location_lat as lat, location_long as lng")))
            ->whereNotNull('approved_at')
            ->get();

        return json_encode($adverts);
    }

    public function registerStudentInterest(Request $request)
    {
        $spam = (!empty($request->input('location_city_lat'))) or (!empty($request->input('location_city_long')));

        if ($spam == false) {
            $inputs = $request->all(["city",
                "subject",
                "subjectId",
                "email",
                "lng",
                "lat"]);
            $interest = RegisterStudentInterest::create($inputs + ['token' => str_random(30)]);
            $interest->save();
        }

        thanks('Nous avons enregistré vos préférences. Merci de votre aide !');

        return redirect()->back();
    }

    public function deactivateStudentInterest(string $token)
    {
        $interest = RegisterStudentInterest::where(['token' => $token])->first();

        if ($interest) {
            $interest->delete();
            thanks('Votre alerte est à présent désactivée');
        }

        return redirect()->back();
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

        $data = SearchArguments::fromArray(['subject' => $subject, 'city' => $city]);

        $search = new Search();

        list($adverts, $distances) = $search->search($data);

        return view('main.index')->with(
            [
                'adverts' => $adverts,
                'subsubjects' => $data->getSubsubjects(),
                'selectedSubject' => $data->getSelectedSubject(),
                'distances' => [],
                'selectedCity' => $data->getCity() ?? null,
                'lat' => $data->getLat(),
                'lgn' => $data->getLgn(),
                'subjectId' => $data->getSubjectId()
            ]
        );

    }

    public function search(Request $request)
    {
        if ($request->get('subject') == null)
            return response()->json([]);

        $data = SearchArguments::fromArray($request->all());

        $search = new Search();

        list($adverts, $distances) = $search->search($data);

        $distances = [];
        $widerRadius = 100;// km

        if (count($adverts) == 0) {
            $data->setRadius($widerRadius);
            list($adverts, $distances) = $search->search($data);
        }

        $results = view('main.multipleAdvertPreview')
            ->with([
                    'adverts' => $adverts,
                    'subsubjects' => $data->getSubsubjects(),
                    'selectedSubject' => $data->getSelectedSubject(),
                    'distances' => $distances,
                    'selectedCity' => $data->getCity() ?? null,
                    'radius' => $data->getRadius() ?? null,
                    'widerSearch' => $data->getRadius() == $widerRadius,
                    'lat' => $data->getLat(),
                    'lgn' => $data->getLgn(),
                    'subjectId' => $data->getSubjectId()
                ]
            )->render();

        return response()->json(
            [
                'params' => $data->toArray(),
                'count' => $adverts->total(),
                'distances' => $distances,
                'results' => $results,
            ]);
    }


    public function preview($slug)
    {
        $advert = Advert::findBySlug($slug);

        if ($advert == NULL) {
            \App::abort(404);
        }

        $view = view('professeur.advert.view')->with(compact('advert'));

        if ($advert->published_at == NULL) {
            $view->with(['info' => "Cette annonce n'est pas encore publiée et n'est pas visible des élèves",
                'thisIsAPreview' => true]);
        }

        if ($advert->isAwaitingApproval()) {
            $view->with(['info' => "Cette annonce n'est pas encore visible des élèves. Elle sera visible dés qu'elle aura été approuvée par un modérateur."]);
        }

        return $view;
    }


    public function latestAdverts()
    {
        return Advert::whereNotNull('published_at')->whereNotNull('approved_at')->orderBy('created_at', 'DESC')->has('avatar')->paginate(5);
    }

    public function getLatestAdvertsPerSubjectID(int $subjectId)
    {
        return Advert::whereHas('subjectsPerAd', function ($query) use ($subjectId) {
            $query->where('subject_id', $subjectId);
        })->whereNotNull('published_at')->whereNotNull('approved_at')->orderBy('created_at', 'DESC')->has('avatar')->paginate(5);
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
            1 => 'fa-graduation-cap',
            2 => 'fa-flask',
            3 => 'fa-line-chart',
            4 => 'fa-language',
            5 => 'fa-balance-scale',
            6 => 'fa-group',
            7 => 'fa-laptop',
            8 => 'fa-music',
            9 => 'fa-futbol-o',
            10 => 'fa-paint-brush',
            11 => 'fa-fort-awesome',
        ];
        foreach ($popularSubjects as $key => $value) {
            $r[] = array_merge(array_merge($value, $s[$key]), ['class' => $icons[$s[$key]['parent_id']]]);
        }
        return collect($r);
    }
}
