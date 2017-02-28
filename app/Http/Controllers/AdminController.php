<?php

namespace App\Http\Controllers;

use App\Events\AdvertWasRejectedByAdmin;
use App\Models\Advert;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
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
}
