@extends('layouts.master')

@section('content')
    <h1 class="center">Annonces en attente de validation ({{$adverts->count()}})</h1>
    <div class="col-md-10 topmargin-lg col-md-offset-1" id="content">

        @include('includes.success')
        @foreach($adverts as $advert)

            <div class="row border1px bottommargin-sm">

                <div class="col-md-2">{{\App\Models\User::find($advert->user_id)->firstname}}</div>

                <div class="col-md-4">
                    <a href="/{{$advert->slug}}">{{$advert->title}}</a>
                </div>

                <div class="col-md-3">
                    Créée : {{$advert->created_at}}
                </div>

                <div class="col-md-3">
                    Piéce d'identité : {{ \App\Models\IdDocument::isVerified($advert->user_id) ? 'Validée': 'Pas validée et/ou envoyée' }}
                </div>

            </div>
        @endforeach

        @if($adverts->count() == 0)
            <div class="col-md-12">Pas d'annonces à valider</div>
        @endif

    </div>
@endsection