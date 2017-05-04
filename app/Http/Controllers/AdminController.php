<?php

namespace App\Http\Controllers;

use App\Events\AdvertWasAcceptedByAdmin;
use App\Events\AdvertWasRejectedByAdmin;
use App\Models\Advert;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function adminDashboard()
    {
        $advertsCount = Advert::whereNotNull('published_at')->whereNull('approved_at')->count();
        $usersCount = User::count();
        $approvedAdvertsCount = Advert::whereNotNull('approved_at')->whereNotNull('published_at')->orderBy('approved_at', 'DESC')->count();
        $archivedAdvertsCount = Advert::whereNull('published_at')->orderBy('created_at', 'desc')->count();

        return view('admin.adminOverview')->with(compact('advertsCount', 'usersCount', 'approvedAdvertsCount', 'archivedAdvertsCount'));
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

    public function listAcceptedAdverts()
    {
        $adverts = Advert::whereNotNull('approved_at')->whereNotNull('published_at')->orderBy('approved_at', 'DESC')->get();

        return view('admin.approvedAdverts')->with(compact('adverts'));
    }

    public function listArchivedAdverts()
    {
        $adverts = Advert::whereNull('published_at')->orderBy('created_at', 'DESC')->get();

        return view('admin.unfinishedOrArchivedAdverts')->with(compact('adverts'));
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

    public function fixEmails()
    {
        $rejected = Notification::where(['name' => 'advert_rejected'])->get();

        foreach ($rejected as $r)
        {
            event(new AdvertWasRejectedByAdmin(Advert::find($r->advert_id), $r->message));
            sleep(1);
        }
    }
}
