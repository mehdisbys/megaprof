@extends('layouts.master')

@section('content')
    {!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
    {!! HTML::style("temp-css/awesomplete.css") !!}
    {!! HTML::style("css/fa/css/font-awesome.min.css") !!}
    {!! HTML::style("css/slick.css") !!}
    {!! HTML::style("css/slick-theme.css") !!}

    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=fr-FR&key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::script("js/jquery.geocomplete.min.js") !!}
    {!! HTML::script("js/jquery.form.min.js") !!}
    {!! HTML::script("js/parsley.min.js")!!}
    {!! HTML::script("js/jquery.vticker.min.js")!!}


    <!-- one ============= -->
    <div class="home-search ">


        <h1 class="search-title">Apprenez sans limites</h1>

        <div id="matieres" class="matieres-scroller hidden">
            <ul>
                <li>Arts</li>
                <li>Droit</li>
                <li>Économie</li>
                <li>Informatique</li>
                <li>Langues</li>
                <li>Loisirs</li>
                <li>Musique</li>
                <li>Sciences</li>
                <li>Sciences Humaines</li>
                <li>Soutien Scolaire</li>
                <li>Sports</li>
            </ul>
        </div>

        <div class="col-md-12 btns">
            <div class="student-btn-div">
                <a id="student-btn" href="#student-info" class="btn btn-info btn-lg ">Trouver un Professeur</a>
            </div>
            <div class=" teacher-btn-div">
                <a href="/professeur" class="btn btn-warning btn-lg ">Donner des Cours</a>
            </div>
        </div>

        <div class="home-search-form-inner autocomplete">
        </div>
        <!-- <div id="howto-btn" class="howto"><a href="#howto" class="howto-link">Comment ça marche</a></div> -->
    </div>


    <div class="student-info col-md-12">
        <div class="wraper">
            <div class="home-hare-opinion">
                <div class="col-md-12"><h2 class="section-title">Trouver un professeur, c'est facile !</h2></div>
                <div class="topmargin-big col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="col-md-12" data-tooltip="En un clic, Taelam vous

                                    propose une liste de professeurs

                                    et d’activités multiples pour tous

                                    les goûts et les budgets près de

                                    chez vous
                                "><i style="color:#7663ff;"
                                                      class="fa fa-binoculars fa-5x clearfix"></i></div>
                            <div class="col-md-12">Découvrez des activités et des professeurs partout au Maroc</div>

                        </div>


                        <div class="col-md-3">
                            <div class="col-md-12" data-tooltip="Choisissez des professeurs

                                    sélectionnés et vérifiés par nos

                                    soins. Fixez vos objectifs avec votre

                                    professeur et atteignez-les grâce à

                                    un suivi personnalisé
                                "><i style="color:#b0ed7c;" class="fa fa-bullseye fa-5x clearfix"></i>
                            </div>
                            <div class="col-md-12">Trouvez parmi les professeurs sélectionnés, Votre professeur</div>

                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12" data-tooltip="Après avoir sélectionné une

                                    matière et un lieu, réservez

                                    un cours avec le professeur

                                    qui correspond le mieux à

                                    vos attentes
                                "><i style="color:#6a91ff;"
                                                      class="fa fa-calendar-check-o fa-5x clearfix"></i>
                            </div>
                            <div class="col-md-12">Réservez votre activité</div>

                        </div>

                        <div class="col-md-3">
                            <div class="col-md-12" data-tooltip="Apprenez, échangez

                                    ou perfectionnez vos

                                    connaissances
                                "><i style="color:#ffcc66;"
                                                      class="fa fa-thumbs-o-up fa-5x clearfix"></i>
                            </div>
                            <div class="col-md-12">

                                <div class="col-md-12">Commencez à apprendre !</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 topmargin-big">

            <div class="quote-container">
                <i class="pin"></i>
                <blockquote class="note yellow">
                    Le site n'est pas encore ouvert aux élèves car nous sommes en train de <strong>sélectionner les meilleurs professeurs pour vous</strong>, mais
                    vous pouvez nous aider en remplissant les champs ci-dessous, merci !
                    <cite class="author">Équipe Taelam</cite>
                </blockquote>

            </div>


            <div class="col-md-12 row student-get-interest">

                <form id="search_form" action="student" method="POST">
                    {!! csrf_field() !!}

                    <div class="col-md-1">
                        <input type="hidden" class="" name="location_city_lat">
                        <input type="hidden" class="" name="location_city_long">
                    </div>

                    <div class="student-input  col-md-3">
                        <input type="text" class="home-search-input " placeholder="Ville" name="city"
                               id="location_input">
                    </div>

                    <div class="student-input  col-md-3">

                        <input id="subject_input" type="text" class="home-search-input "
                               placeholder="Ex: Anglais, Piano, Yoga" name="subject"
                               data-minchars="1"
                               data-autofirst="1"
                               data-list="{!! $subsubjects !!}">
                    </div>

                    <div class="student-input col-md-3">
                        <input type="email" class="home-search-input" placeholder="Email" name="email" required
                               data-parsley-required-message="Un email valide est requis." data-parsley-type="email">
                    </div>

                    <div class="student-input-submit-button">
                        <button id="submit-bttn" class="btn btn-info btn-lg" type="submit">Envoyer</button>
                    </div>
                    <div class="location-details no-visibility">
                        {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
                        {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
                        {!! Form::hidden('loc_name', null, ['id' => 'loc_name']) !!}
                    </div>

                </form>

            </div>

            <div class="student-presentation well-get-in-touch">Nous vous contacterons dès que des professeurs dans la
                matière de votre choix
                seront disponibles.
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

                //TODO @postlaunch remove following line
                this.submit();

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
                    return new RegExp("^" + removeDiacritics(input.match(/[^,]*$/)[0].trim()), "i").test(removeDiacritics(text));
                },
                replace: function (text) {
                    var before = this.input.value.match(/^.+,\s*|/)[0];
                    this.input.value = before + text + ", ";
                }
            });
        });

        $("#student-btn").click(function () {
            $('html, body').animate({
                scrollTop: $("#search_form").offset().top
            }, 1500);
        });

        $(function() {
            $('#matieres').removeClass('hidden');
            $('#matieres').vTicker('init',{pause: 2000, mousePause:false});
        });
    </script>

    @include('includes.gmaps.autocomplete')

@endsection

