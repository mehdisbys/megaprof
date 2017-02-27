<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;
use App\Models\Comment;
use App\Models\UserRatings;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{

    private $engine;

    public function __construct(SearchAdvertContract $engine)
    {
        $this->engine = $engine;
    }

    public function view(string $slug)
    {
        $advert = NULL;

        $user = Auth::user();

        if ($user and $user->isAdmin()) {
            $advert = Advert::where(['slug' => $slug])->first();
        }

        else if ($user and $user->ownsAdvertBySlug($slug)) {
            $advert = Advert::where(['slug' => $slug])->first();
            if ($advert->approved_at === NULL and $advert->published_at != NULL) {

                info_message("Votre annonce : <i>". $advert->title ."</i> est en attente de modération. Elle n'est pas encore visible des élèves. Nous la publierons dès que son contenu aura été validé par un membre de notre équipe. Un aperçu est disponible <a href='/preview/{$advert->slug}'>ici</a>");

                return redirect('/mon-compte');
            }
        } else {
            $advert = Advert::where(['slug' => $slug])
                ->whereNotNull('published_at')
                ->whereNotNull('approved_at')
                ->first();
        }

        if ($advert === NULL) {
            return App::abort(404);
        }

        $comments       = Comment::commentsForAdvertId($advert->id);
        $similarAdverts = $this->findSimilarAdverts($advert);
        $ratings        = UserRatings::where(['user_id' => $advert->user->id])->first();

        return view('professeur.advert.view')->with(compact('advert', 'comments', 'similarAdverts', 'ratings'));
    }

    public function findSimilarAdverts(Advert $advert)
    {
        $data = new \stdClass();

        $data->subjectId       = $advert->getSubjectId();
        $data->lat             = $advert->location_lat;
        $data->lgn             = $advert->location_long;
        $data->radius          = null;
        $data->exceptAdvertIds = [$advert->id];

        Advert::paginateCount(5);
        list($adverts, $distances) = $this->engine->search($data);
        return $adverts;
    }

}
