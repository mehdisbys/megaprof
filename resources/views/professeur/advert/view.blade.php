@extends('layouts.master')

@section('content')


    <div class="row" data-spy="scroll" data-target=".scrollspy">

        <div id="author" class="col-md-3 col-md-offset-1 scrollspy">
            <div id="leftside" data-spy="affix">
                <img src="{{ $advert->getAvatar() }}" alt="">

                <div id="info-author">
                    <div class="entry-overlay-meta">
                        <h3><a href="#" class=" center">Yacine</a></h3>
                        <div class="clearfix"></div>
                        <ul class="iconlist">
                            <li><i class="icon-location"></i> <strong>{{ $advert->location_city }}</strong> </li>
                            <li><i class="icon-study green"></i> <strong>Diplôme vérifié</strong></li>
                            <li><i class="icon-check green"></i> <strong>Coordonnées vérifiées</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <h3>{{ $advert->title }}</h3>

            <div id="presentation"> {{ $advert->presentation  }}</div>

            <div class="divider divider-center"><i class="icon-circle"></i></div>

            <div class="">
                <h4 id="experience-title" class="center experience-title">Expérience</h4>
                <div id="experience"> {{ $advert->experience }}</div>
            </div>

            <div class="divider divider-center"><i class="icon-circle"></i></div>

            <div class="">
                <h4 id="curriculum-title" class="center curriculum-title">Curriculum Vitae</h4>
                <div id="curriculum"> {{ $advert->content }}</div>
            </div>
        </div>

        <div class="col-md-3 scrollspy">
            <div id="rightside" data-spy="affix" class="">

                <div id="info-price" >
                    <div class="entry-overlay-meta">
                        <h3><a href="#" class=" center"> {{$advert->price}} Dhs/h</a></h3>

                        <h4>Premier cours offert !</h4>

                        <div class="col-md-8">
                            <a class="btn btn-danger btn-block btn-md" href="#">Réserver un cours</a>
                        </div>
                        <div class="col-md-10 topmargin-sm">
                            <a href="#" class="social-icon si-colored si-facebook">
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="social-icon si-colored si-gplus"  >
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                            <a href="#" class="social-icon si-colored si-twitter"  >
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="social-icon si-colored si-email3"  >
                                <i class="icon-email3"></i>
                                <i class="icon-email3"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div id="validate_buttons" class="col-md-12 text-center topmargin-lg">

        <button id="back_button" class="button button-3d button-large button-rounded button-teal">
            Modifier
        </button>

        <button type="submit" class="button button-3d button-large button-rounded button-green">
            Publier l'annonce
        </button>
    </div>

    <script>

        $( document ).ready(function() {

            $("#leftside").affix({
                offset: {
                    top: $("#leftside").offset().top,
                    bottom: ($('#validate_buttons').outerHeight(true) + $('#footer').outerHeight(true)) + 100}});

            $("#rightside").affix({
                offset: {
                    top: $("#rightside").offset().top,
                    bottom: ($('#validate_buttons').outerHeight(true) + $('#footer').outerHeight(true)) + 140}});

        });

    </script>



@endsection