<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Booking;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::currentUserAdverts();

        $bookings = Booking::currentProfBookingRequests();

        return view('dashboard.index')->with(compact('adverts', 'bookings'));

    }


}
