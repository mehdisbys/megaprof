@extends('layouts.master')

@section('content')
    <div>
        <h2 class="col-md-12 center">Publication de l'annonce</h2>

        <div class="col-md-12 center">
            <h5>Félicitations votre annonce est prête à être publiée!</h5>
        </div>

        <div class="row border1px">

            <div class="">
                <div id="author" class="col-md-3 col-md-offset-1">
                    <div id="leftside">
                        <img src="{{ $advert->getAvatar() }}" alt="">

                        <h3><a href="#" class=" center">Yacine</a></h3>
                    </div>
                </div>

                <div class="col-md-5">
                    <h4>{{ $advert->title }}</h4>

                    <div id="presentation"> {{ str_limit($advert->presentation, 345) }}</div>
                    <div class="pull-right"><i class="icon-location"></i> Habite à <strong>{{ $advert->location_city }}</strong> </div>

                </div>

                <div class="col-md-3">
                    <div id="rightside">

                        <div id="info-price" >
                            <div class="entry-overlay-meta">
                                <h3><a href="#" class=" center"> {{$advert->price}} Dhs/h</a></h3>

                                <h4>Premier cours offert !</h4>
                                {!! Form::open(['url' => '/nouvelle-annonce-7']) !!}
                                {!! Form::hidden('advert_id', $advert->id) !!}
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-danger btn-block btn-md" href="#">Voir l'annonce</button>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        {!! Form::open(['url' => '/nouvelle-annonce-7']) !!}
        {!! Form::hidden('advert_id', $advert->id) !!}

        <div id="validate_buttons" class="col-md-12 text-center topmargin-lg">

            <button type="submit" class="button button-3d button-large button-rounded button-green">
                Publier l'annonce
            </button>
        </div>
        {!! Form::close() !!}

        <script>

            $( document ).ready(function() {

            });

        </script>

    </div>

@endsection