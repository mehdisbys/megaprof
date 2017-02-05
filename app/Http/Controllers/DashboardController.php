<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\Notification;
use App\Http\Requests;
use App\Models\User;
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
        $notifications    = Notification::currentUserNotifications();
        $adverts          = Advert::currentUserAdverts();
        $pendingComments  = Comment::currentUserPendingComments();
        $bookings         = Booking::currentProfBookingRequests();
        $archivedBookings = Booking::archivedBookingRequests();
        $user             = User::find(Auth::id());

        $user->birthdate ? list($dobday, $dobmonth, $dobyear) = explode('/', $user->birthdate) : null;

        return view('dashboard.index')->with(get_defined_vars());
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

    public function updateProfile()
    {
        $data              = array_only(Input::all(), ['gender',
            'firstname',
            'lastname',
            'dobday',
            'dobmonth',
            'dobyear',
            'email',
            'telephone']);
        $user              = User::find(Auth::id());
        $data['birthdate'] = implode('/', [$data["dobday"],
            $data["dobmonth"],
            $data["dobyear"]]);
        $user->update($data);
        return $this->index();
    }

    public function completeProfile()
    {
        $user = User::find(Auth::id());
        return view('dashboard.complete-profile')->with(get_defined_vars());
    }
}
