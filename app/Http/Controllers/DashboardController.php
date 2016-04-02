<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications  = Notification::currentUserNotifications();
        $recentRequests = Booking::bookingRequestsUserReceived();
        $adverts        = Advert::currentUserAdverts();
        $bookings       = Booking::currentProfBookingRequests();

        return view('dashboard.standard')->with(compact('adverts', 'bookings', 'recentRequests', 'notifications'));
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
