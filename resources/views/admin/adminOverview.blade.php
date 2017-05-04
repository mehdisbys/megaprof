@extends('layouts.master')

@section('content')

    <h1 class="center">Administration </h1>
    <div class="col-md-10 topmargin-lg bottommargin-lg col-md-offset-1" id="content">

        <h2 class="col-md-6 border1px"><a href="/annonces-en-attente-de-moderation">Annonces à modérer :  {{$advertsCount}}</a></h2>
        <h2 class="col-md-6 border1px"><a href="/admin/lister-utilisateurs">Utilisateurs : {{$usersCount}}</a></h2>
        <h2 class="col-md-6 border1px"><a href="/annonces-validees">Annonces validées : {{$approvedAdvertsCount}}</a></h2>
        <h2 class="col-md-6 border1px"><a href="/annonces-brouillons">Brouillons : {{$archivedAdvertsCount}}</a></h2>
        <h2 class="col-md-12 border1px">
            <a class="col-md-2" href="https://analytics.google.com/analytics/web/"><i class="fa fa-line-chart"></i></a>
            <a class="col-md-2" href="https://www.facebook.com/taelamOfficiel"><i class="fa fa-facebook-square"></i></a>
            <a class="col-md-2" href="https://twitter.com/taelam_officiel"><i class="fa fa-twitter-square"></i></a>
            <a class="col-md-2" href="https://plus.google.com/u/1/115934799609055669898"><i class="fa fa-google-plus-square"></i></a>
            <a class="col-md-2" href="https://www.smartlook.com/app/dashboard"><i class="fa fa-eye"></i></a>
        </h2>
    </div>
@endsection