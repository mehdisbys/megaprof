@extends('layouts.__master')

@section('content')


    <div class="col-md-8 col-md-offset-2">
        <h2>Édition d'annonce</h2>

            <ul class="nav nav-pills">

            <div class="col-md-2">
                <a href="/modifier-annonce-1/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation" tabindex="-1" id="ui-id-137">Matières</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-2/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation" tabindex="-1" id="ui-id-139">Titre</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-3/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation" tabindex="-1" id="ui-id-140">Lieu</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-4/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation" tabindex="-1" id="ui-id-141">Description</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-5/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation" tabindex="-1" id="ui-id-142">Prix</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-6/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation" tabindex="-1" id="ui-id-143">Photo</a>
            </div>
            </ul>
    </div>

        <div class="col-md-12 topmargin-sm">
            @include("professeur.partials.step{$step}")
        </div>
@endsection