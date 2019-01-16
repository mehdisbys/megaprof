<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\SearchResults;
use App\Models\UserRatings;
use App\Search\Search;
use App\Search\SearchArguments;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{

    public function view(string $slug)
    {
        /** @var Advert $advert */
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
        $bookings       = Booking::getAcceptedProfBookings($advert->user);
        $similarAdverts = $this->findSimilarAdverts($advert);
        $ratings        = UserRatings::where(['user_id' => $advert->user->id])->first();

        return view('professeur.advert.view')->with
        (compact('advert', 'comments', 'similarAdverts', 'ratings', 'bookings'));
    }

    public function findSimilarAdverts(Advert $advert)
    {
        Advert::paginateCount(5);

        $data = SearchArguments::fromArray([
                                               'subjectId' => $advert->getSubjectId(),
                                               'lat'       => $advert->location_lat,
                                               'lgn'       => $advert->location_long
                                           ]);

        SearchResults::disableRecording();
        $search = new Search();

        list($adverts, $distances) = $search->search($data, [$advert->id]);

        return $adverts;
    }

}
