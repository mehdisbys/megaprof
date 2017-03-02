@extends('layouts.master')

@section('content')
    {!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
    {!! HTML::style("temp-css/awesomplete.css") !!}
    {!! HTML::style("css/fa/css/font-awesome.min.css") !!}
    {!! HTML::style("css/slick.css") !!}
    {!! HTML::style("css/slick-theme.css") !!}

    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR&amp;key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::script("js/jquery.geocomplete.min.js") !!}
    {!! HTML::script("js/jquery.form.min.js") !!}

    <!-- one ============= -->
    <div class="home-search">


        <h1 class="search-title">Apprenez sans limites</h1>
        <div class="home-search-form-inner autocomplete">
            <form action="/search" id="search_form" class="home-search-form autocomplete-form">
                {!! csrf_field() !!}

                <div class="home-search-field-wrapper">
                    <input
                            id="subject_input"
                            class="home-search-input autocomplete-input"
                            placeholder="Que souhaitez-vous apprendre ?"
                            data-minchars="1"
                            data-autofirst="1"
                            data-list="{!! $subsubjects !!}"
                            name="subject"
                            type="text"
                            autocomplete="off"
                            aria-autocomplete="list"/>
                </div>

                <div class="home-search-field-wrapper">
                    <input id="location_input"
                           class="home-search-input"
                           placeholder="Ville où le cours a lieu"
                           name="city" type="text"/>
                </div>

                <div class="home-search-button-wrapper">
                    <button id="submit-btn" class="button" type="submit"> Chercher</button>
                </div>
                <div class="location-details no-visibility">
                    {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
                    {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
                </div>
            </form>
        </div>
        <div id="howto-btn" class="howto"><a href="#howto" class="howto-link">Comment ça marche</a></div>
    </div>

    <!-- two ============= -->


    <!-- three ============= -->

    <div class="">
        <div class="wrapper">
            <div class="col-md-12">
                <div class="col-md-12 topmargin-big"><h2 class="section-title">Vous souhaitez partager votre savoir ?</h2></div>
                <div class="topmargin-big col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-3"><h4> 1. Créer une annonce gratuitement</h4></div>
                        <div class="col-md-3"><h4>2. Fixez vos propres tarifs</h4></div>
                        <div class="col-md-3"><h4>3. Répondez aux demandes de vos élèves</h4></div>
                        <div class="col-md-3"><h4>4. Construisez votre business</h4></div>
                    </div>

                    <div class="col-md-12 topmargin-small bottommargin-big">
                        <div class="col-md-3">
                            <small>Des milliers de personnes cherchent

                                des professeurs particuliers chaque

                                jour. TAELAM vous donne la

                                possibilité de créer un compte
                            </small>
                        </div>

                        <div class="col-md-3">
                            <small>Pas d’intermédiaire, c’est à votre

                                guise ! Vous déterminez le prix de

                                votre cours, votre disponibilité et

                                le choix de vos élèves
                            </small>
                        </div>

                        <div class="col-md-3">
                            <small>Des élèves vous contactent, échangez avec

                                eux et acceptez ou refusez leurs demandes
                            </small>
                        </div>


                        <div class="col-md-3">
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


    <!-- four ============= -->
    <div class="topmargin-xtra-big section">
        <div class="wrapper">
            <div class="home-share-opinion">
                <div class="col-md-12 topmargin-big"><h2 class="section-title">Avec Taelam, c'est facile !</h2></div>
                <div class="topmargin-big col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-3"><i style="color:#7663ff;"class="fa fa-binoculars fa-5x clearfix"></i></div>
                        <div class="col-md-3"><i style="color:#b0ed7c;" class="fa fa-bullseye fa-5x clearfix"></i></div>
                        <div class="col-md-3"><i style="color:#6a91ff;" class="fa fa-calendar-check-o fa-5x clearfix"></i></div>
                        <div class="col-md-3"><i style="color:#ffcc66;"class="fa fa-thumbs-o-up fa-5x clearfix"></i></div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-3">Découvrez des activités et des professeurs partout au Maroc</div>
                        <div class="col-md-3">Trouvez parmi les professeurs sélectionnés, Votre professeur</div>
                        <div class="col-md-3">Réservez votre activité</div>
                        <div class="col-md-3">Commencez à apprendre !</div>
                    </div>

                    <div class="col-md-12 topmargin-small">
                        <div class="col-md-3">
                            <small>En un clic, Taelam vous

                                propose une liste de professeurs

                                et d’activités multiples pour tous

                                les goûts et les budgets près de

                                chez vous
                            </small>
                        </div>

                        <div class="col-md-3">
                            <small>Choisissez des professeurs

                                sélectionnés et vérifiés par nos

                                soins. Fixez vos objectifs avec votre

                                professeur et atteignez-les grâce à

                                un suivi personnalisé
                            </small>
                        </div>

                        <div class="col-md-3">
                            <small>Après avoir sélectionné une

                                matière et un lieu, réservez

                                un cours avec le professeur

                                qui correspond le mieux à

                                vos attentes
                            </small>
                        </div>


                        <div class="col-md-3">
                            <small>Apprenez, échangez

                                ou perfectionnez vos

                                connaissances
                            </small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div>
        <div class="scrolling-pane topmargin-lg">
            <h2 class="section-title">Pourquoi choisir Taelam ?</h2>

            <div class="row">
                <ul id="bubbles">
                    <li class="scroll-items col-md-2 pane-a" id="subject-1">
                        <div class="fa fa-refresh fa-3x"></div>
                        <a href="">Flexibilité</a>
                    </li>
                    <li class="scroll-items col-md-2 pane-a" id="subject-1">
                        <div class="fa fa-check fa-3x"></div>
                        <a href="">Profils vérifiés</a>
                    </li>
                    <li class="scroll-items col-md-2 pane-a" id="subject-1">
                        <div class="fa fa-handshake-o fa-3x"></div>
                        <a href="">Sans intermédiaire</a>
                    </li>
                    <li class="scroll-items col-md-2 pane-b" id="subject-1">
                        <div class="fa fa-money fa-3x"></div>
                        <a href="">Économique</a>
                    </li>
                    <li class="scroll-items col-md-2 pane-b" id="subject-1">
                        <div class="fa fa-lock fa-3x"></div>
                        <a href="">Sécurisé</a>
                    </li>
                    <li class="scroll-items col-md-2 pane-b" id="subject-1">
                        <div class="fa fa-flask fa-3x"></div>
                        <a href="">Des activités variées</a>
                    </li>
                </ul>
            </div>
        </div>
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
            setInterval(toggleFade, 5000);

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

