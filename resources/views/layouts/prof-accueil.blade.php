@extends('layouts.master')

@section('content')
    {!! HTML::style("css/awesomplete.css") !!}
    {!! HTML::style("css/fa/css/font-awesome.min.css") !!}
    {!! HTML::style("css/slick.css") !!}
    {!! HTML::style("css/slick-theme.css") !!}

    <!-- one ============= -->
    <div class="home-search-prof">


        <h1 class="search-title-prof">Partagez vos compétences</h1>

        <p class="prof-short-presentation">Partager sa passion ou ses compétences et être rémunéré c'est facile avec
            Taelam.
            Des dizaines de matières et activités variées sont disponibles !</p>

        <div id="prof-register" class="teacher-btn-div">
            <a href="/inscription" class="btn btn-success btn-lg "><i class="fa fa-pencil-square-o"></i> Créer une
                annonce</a>
        </div>
    </div>

    <!-- two ============= -->


    <!-- three ============= -->


    <div class="prof-info col-md-12">
        <div class="wraper">
            <div class="comd-12">
                <div class="col-md-12 topmargin-big"><h2 class="section-title">Diffusez votre annonce en quelques
                        clics</h2></div>
                <div class="topmargin-big col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-3">


                            <div class="col-md-12"><i style="color:#6a91ff;"
                                                      class="fa fa-pencil-square-o fa-5x clearfix"></i></div>
                            <div class="col-md-12"><a href="/inscription"><h4> Créer une annonce gratuitement</h4></a>
                            </div>
                            <div class="col-md-12">
                                <small>Des milliers de personnes cherchent

                                    des professeurs particuliers chaque

                                    jour. TAELAM vous donne la

                                    possibilité de créer un compte
                                </small>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="col-md-12"><i style="color:#b0ed7c;"
                                                      class="fa fa-money fa-5x clearfix"></i></div>
                            <div class="col-md-12"><h4>Fixez vos propres tarifs</h4></div>
                            <div class="col-md-12">
                                <small>Pas d’intermédiaire, c’est à votre

                                    guise ! Vous déterminez le prix de

                                    votre cours, votre disponibilité et

                                    le choix de vos élèves
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12"><i style="color:#fd875e;"
                                                      class="fa fa-users fa-5x clearfix"></i></div>

                            <div class="col-md-12"><h4>Répondez aux demandes de vos élèves</h4></div>
                            <div class="col-md-12">
                                <small>Des élèves vous contactent, échangez avec

                                    eux et acceptez ou refusez leurs demandes
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12"><i style="color:#ffcc66;"
                                                      class="fa fa-dashboard fa-5x clearfix"></i></div>

                            <div class="col-md-12"><h4>Construisez votre business</h4></div>
                            <div class="col-md-12">
                                <small>Consultez et suivez vos cours,

                                    organisez-vous grâce à votre

                                    tableau de bord
                                </small>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <!-- four ============= -->



    <div>
        @include('main.why-choose-taelam')
    </div>




    {!! HTML::script("js/slick.min.js") !!}

    <!-- five ============= -->
    @include('includes.awesomeplete.diacritics')

    <script>
        $(document).ready(function () {

            $('.carousel').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false,
                dots: true,
                cssEase: 'linear',
            });

            var submitForm = function (event) {
                event.preventDefault();
                var subject = $("#subject_input").val();
                var loc = $("#location_input").val();
                toastr.options.positionClass = "toast-top-full-width";

                if (subject.length < 1) {
                    toastr.info("Veuillez saisir une matière");
                    return;
                }

                if (loc.length < 1) {
                    toastr.info("Veuillez sélectionner une ville");
                    return;
                }

                url = "/annonces/" + subject + "/" + loc;
                url = url.replace(/ /g, '-');
                window.location.assign(url);
            };

            $("#search_form").submit(submitForm);

            var abba = true;

            $('.pane-b').hide();

            function toggleFade() {
                if (abba) {
                    $('.pane-a').fadeOut('slow', function () {
                        $('.pane-b').fadeIn('slow');
                        abba = false;
                    });
                } else {
                    $('.pane-b').fadeOut('slow', function () {
                        $('.pane-a').fadeIn('slow');
                        abba = true;
                    });
                }
            };
            // setInterval(toggleFade, 5000);

            new Awesomplete(document.getElementById('subject_input'), {
                filter: function (text, input) {
                    return new RegExp("^" + removeDiacritics(input.trim()), "i").test(removeDiacritics(text));
                }
            });
        });

        $("#howto-btn").click(function () {
            $('html, body').animate({
                scrollTop: $("#howto").offset().top
            }, 1500);
        });

    </script>

    @include('includes.gmaps.autocomplete')

@endsection
