@extends('layouts.master')

@section('content')

    <a class="col-md-12 col-md-offset-2 bottommargin-lg" href="/admin"> {{"<<"}} Retour Page Admin</a>

    <h1 class="center">Réservations en attente de réponse({{$bookings->count()}})</h1>

    <div class="col-md-10 topmargin-lg col-md-offset-1" id="content">

        @include('includes.success')

        @include('admin.partials.listBookings')

        @if($bookings->count() == 0)
            <div class="col-md-12">Pas de réservations en attente de réponse</div>
        @endif

    </div>
@endsection