<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications   = Notification::currentUserNotifications();
        $recentRequests  = Booking::bookingRequestsUserReceived();
        $adverts         = Advert::currentUserAdverts();
        $pendingComments = Comment::currentUserPendingComments();
        $bookings        = Booking::currentProfBookingRequests();

        return view('dashboard.standard')->with(get_defined_vars());
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
}
