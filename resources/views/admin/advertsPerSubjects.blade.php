@extends('layouts.master')

@section('content')

    <a class="col-md-12 col-md-offset-2 bottommargin-lg" href="/admin"> {{"<<"}} Retour Page Admin</a>

    <h1 class="center">Annonces par matières</h1>


    <div class="col-md-10 topmargin-lg col-md-offset-1" id="content">

        @include('includes.success')

        @foreach($advertsGroupedBySubject as $subject => $adverts)
            <h3 class="col-md-8 topmargin-lg">{{\App\Models\SubSubject::find($subject)->name}} ({{$adverts->count()}})</h3>

        <ul>
            @foreach($adverts as $advert)

                @if($advert->advert)
                <li class="col-md-8 col-md-offset-1"><a href="/{{$advert->advert->slug}}"> {{$advert->advert->title}} </a></li>
                @endif
                
            @endforeach
        </ul>
        @endforeach

        @if($advertsGroupedBySubject->count() == 0)
            <div class="col-md-12">Pas d'annonces</div>
        @endif

    </div>
@endsection