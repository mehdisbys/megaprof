@extends('dashboard.index')

@section('dashboard-content')
    <div class="col-md-8">

        <ul class="nav nav-pills" role="tablist">
            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0"
                aria-controls="tabs-137" aria-labelledby="ui-id-137" aria-selected="true">
                <a href="/modifier-annonce-1/{{$advert->id}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-137">Matières</a>
            </li>

            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-139"
                aria-labelledby="ui-id-139" aria-selected="false">
                <a href="/modifier-annonce-2/{{$advert->id}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-139">Niveau</a>
            </li>

            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-140"
                aria-labelledby="ui-id-140" aria-selected="false">
                <a href="/modifier-annonce-3/{{$advert->id}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-140">Lieux</a>
            </li>

            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-141"
                aria-labelledby="ui-id-141" aria-selected="false">
                <a href="/modifier-annonce-4/{{$advert->id}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-141">Texte</a>
            </li>

            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-142"
                aria-labelledby="ui-id-142" aria-selected="false">
                <a href="/modifier-annonce-5/{{$advert->id}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-142">Tarifs</a>
            </li>

            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-143"
                aria-labelledby="ui-id-143" aria-selected="false">
                <a href="/modifier-annonce-6/{{$advert->id}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-143">Photo</a>
            </li>
        </ul>
    </div>

        <div class="col-md-12 topmargin-sm">
            @include("professeur.partials.step{$step}")
        </div>
@stop