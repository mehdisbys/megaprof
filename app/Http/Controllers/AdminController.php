<?php

namespace App\Http\Controllers;

use App\Events\AdvertWasAcceptedByAdmin;
use App\Events\AdvertWasRejectedByAdmin;
use App\Models\Advert;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function adminDashboard()
    {
        $adverts = Advert::whereNotNull('published_at')->whereNull('approved_at')->get();
        $usersCount = User::count();
        $approvedAdverts = Advert::whereNotNull('approved_at')->get();

        return view('admin.adminOverview')->with(compact('adverts', 'usersCount', 'approvedAdverts'));
    }

    public function listAllUsers()
    {
        $users = User::selectRaw("* , DATE(created_at) as date")->orderBy('created_at', 'DESC')->get();

        $usersGroupedByDate = $users->groupBy('date');

        return view('admin.adminListAllUsers')->with(compact('usersGroupedByDate'));

    }

    public function listWaitingForApprovalAdverts()
    {
        $adverts = Advert::whereNotNull('published_at')->whereNull('approved_at')->get();

        return view('admin.AdvertsToApprove')->with(compact('adverts'));
    }

    public function advertRejected(Request $request, int $advert_id)
    {
        $this->validate($request, ['message' => 'required']);

        $advert = Advert::find($advert_id);

        $advert->published_at = NULL;

        $advert->save();

        event(new AdvertWasRejectedByAdmin($advert, $request->input('message')));

        return redirect('/annonces-en-attente-de-moderation');
    }

    public function advertAccepted(int $advert_id)
    {
        $advert = Advert::find($advert_id);

        $advert->approved_at = Carbon::now();

        $advert->save();

        event(new AdvertWasAcceptedByAdmin($advert));

        thanks("L'annonce vient d'être mise en ligne");

        return redirect('/annonces-en-attente-de-moderation');
    }
}
