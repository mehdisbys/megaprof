<?php

namespace App\Http\Controllers;

use App\Events\IdDocumentSent;
use App\Models\DegreeDocument;
use Illuminate\Support\Facades\Event;
use App\Models\Advert;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\IdDocument;
use App\Models\Notification;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $notifications       = Notification::currentUserNotifications();
        $adverts             = Advert::currentUserAdverts();
        $toBeReviewedAdverts = Advert::toBeReviewedtUserAdverts();
        $archivedAdverts     = Advert::archivedUserAdverts();
        $pendingComments     = Comment::currentUserPendingComments();
        $bookings            = Booking::currentProfBookingRequests();
        $archivedBookings    = Booking::archivedBookingRequests();
        $user                = User::find(Auth::id());

        $user->birthdate ? list($dobday, $dobmonth, $dobyear) = explode('/', $user->birthdate) : null;

        return view('dashboard.index')->with(get_defined_vars());
    }

    public function getNotificaticationCount()
    {
        $count       = Notification::currentUserNotificationsCount();

        return response()->json(['notificationsCount' => $count]);
    }

    public function editAdvert($advert_id)
    {
        $advert = Advert::findOrFail($advert_id);
        return view('dashboard.edit')->with(compact('advert'));
    }

    public function setPicture()
    {
        savePicture(null, 'dashboard');
    }

    public function hideNotification($notificationId)
    {
        Notification::find($notificationId)->update(['hide' => 1]);
    }

    public function updateProfile(Request $request)
    {
        $data              = array_only(Input::all(), ['gender',
            'firstname',
            'lastname',
            'dobday',
            'dobmonth',
            'dobyear',
            'email',
            'telephone',
            'id_document',
            'degree_document']);
        $user              = User::find(Auth::id());
        $data['birthdate'] = implode('/', [$data["dobday"],
            $data["dobmonth"],
            $data["dobyear"]]);

        $user->update($data);


        if ($data['id_document'] ?? null) {
            $idDocument               = IdDocument::firstOrCreate(['user_id' => \Auth::id()]);
            $idDocument->user_id      = \Auth::id();
            $idDocument->id_card      = file_get_contents($request->id_document->getRealPath());
            $idDocument->id_card_name = $request->id_document->getClientOriginalName();
            $idDocument->id_card_mime = $request->id_document->getMimeType();
            $idDocument->id_card_size = $request->id_document->getSize();
            $idDocument->verified     = false;
            $idDocument->save();
            Event::fire(new IdDocumentSent(Auth::user(), $idDocument));
        }

        if ($data['degree_document'] ?? null) {

            $degreeDocument                       = DegreeDocument::firstOrCreate(['user_id' => \Auth::id()]);
            $degreeDocument->user_id              = \Auth::id();
            $degreeDocument->degree_document      = file_get_contents($request->degree_document->getRealPath());
            $degreeDocument->degree_document_name = $request->degree_document->getClientOriginalName();
            $degreeDocument->degree_document_mime = $request->degree_document->getMimeType();
            $degreeDocument->degree_document_size = $request->degree_document->getSize();
            $degreeDocument->verified             = false;
            $degreeDocument->save();
            //Event::fire(new IdDocumentSent(Auth::user(), $idDocument));
        }


        thanks('Merci! Votre profil a bien été mis à jour');


        return redirect()->back();
    }

    public function completeProfile()
    {
        $user = User::find(Auth::id());
        return view('dashboard.complete-profile')->with(get_defined_vars());
    }
}
