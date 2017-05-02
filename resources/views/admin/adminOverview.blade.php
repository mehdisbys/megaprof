@extends('layouts.master')

@section('content')

    <h1 class="center">Administration </h1>
    <div class="col-md-10 topmargin-lg bottommargin-lg col-md-offset-1" id="content">

        <h2 class="col-md-6"><a href="/annonces-en-attente-de-moderation">Annonces à modérer :  {{$adverts->count()}}</a></h2>
        <h2 class="col-md-6"><a href="/admin/lister-utilisateurs">Utilisateurs : {{$usersCount}}</a></h2>
    </div>
@endsection