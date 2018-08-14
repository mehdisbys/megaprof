@extends('layouts.__master')

@section('content')


    <div class="col-md-8 col-md-offset-1">
        <h2><i class="icon icon-pen"></i> @lang('dashboard/edit.advertEdition')</h2>

        <ul class="nav nav-pills">

            <div class="col-md-2">
                <a href="/modifier-annonce-1/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation"
                   tabindex="-1" id="ui-id-137">@lang('dashboard/edit.subjects')</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-2/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation"
                   tabindex="-1" id="ui-id-139">@lang('dashboard/edit.title')</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-3/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation"
                   tabindex="-1" id="ui-id-140">@lang('dashboard/edit.location')</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-4/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation"
                   tabindex="-1" id="ui-id-141">@lang('dashboard/edit.desc')</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-5/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation"
                   tabindex="-1" id="ui-id-142">@lang('dashboard/edit.price')</a>
            </div>

            <div class="col-md-2">
                <a href="/modifier-annonce-6/{{$advert->id}}" class="ui-tabs-anchor nice-orange" role="presentation"
                   tabindex="-1" id="ui-id-143">@lang('dashboard/edit.photo')</a>
            </div>

        </ul>
    </div>
    <div class="col-md-2 topmargin-lg ">
        <a href="/publier/{{$advert->id}}" class="ui-tabs-anchor nice-orange">
            @lang('dashboard/edit.publish')
        </a>
    </div>

    <div class="col-md-12 topmargin-sm">
        @include("professeur.partials.step{$step}")
    </div>
@endsection