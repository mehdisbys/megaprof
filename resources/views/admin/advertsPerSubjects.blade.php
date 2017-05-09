@extends('layouts.master')

@section('content')

    <a class="col-md-12 col-md-offset-2 bottommargin-lg" href="/admin"> {{"<<"}} Retour Page Admin</a>

    <h1 class="center">Annonces par matières</h1>

    <h4 class="center">{{$totalCountOfVirtualAdverts}} annonces virtuelles.</h4>
    <h4 class="center">{{$totalCountOfApprovedAdverts}} annonces réelles.</h4>
    <h4 class="center">{{round($totalCountOfVirtualAdverts/$totalCountOfApprovedAdverts,2)}} matières par annonce en moyenne.</h4>


    <div class="col-md-10 topmargin-lg col-md-offset-1" id="content">

        @include('includes.success')

        @foreach($advertsGroupedBySubject as $subject => $adverts)
            <h3 class="col-md-8 topmargin-lg">{{\App\Models\SubSubject::find($subject)->name}} ({{$adverts->count()}})</h3>

        <ul>
            @foreach($adverts as $advert)

                <li class="col-md-8 col-md-offset-1"><a href="/{{$advert->slug}}"> {{$advert->title}} </a></li>

            @endforeach
        </ul>
        @endforeach

        @if($advertsGroupedBySubject->count() == 0)
            <div class="col-md-12">Pas d'annonces</div>
        @endif

    </div>
@endsection