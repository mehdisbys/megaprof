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
    <div class="home-search ">


        <h1 class="search-title">Apprenez sans limites</h1>

        <div class="col-md-12 btns">
            <div class="col-md-4 col-md-offset-2"><a id="student-btn" href="#student-info"
                                                     class="btn-welcome btn-student">Trouver un Professeur</a></div>
            <div class="col-md-3"><a href="/professeur" class="btn-welcome btn-teacher ">Donner des Cours</a></div>
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
                        <div class="col-md-3"><i style="color:#7663ff;" class="fa fa-binoculars fa-5x clearfix"></i>
                        </div>
                        <div class="col-md-3"><i style="color:#b0ed7c;" class="fa fa-bullseye fa-5x clearfix"></i>
                        </div>
                        <div class="col-md-3"><i style="color:#6a91ff;"
                                                 class="fa fa-calendar-check-o fa-5x clearfix"></i></div>
                        <div class="col-md-3"><i style="color:#ffcc66;"
                                                 class="fa fa-thumbs-o-up fa-5x clearfix"></i>
                        </div>
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

        <div class="col-md-12 topmargin-big">
            <div class="student-presentation">Nous sélectionnons les meilleurs professeurs dans votre région pour vous !
            </div>

            <div class="student-presentation">Vous pouvez nous aider !</div>
            <div class="student-presentation">Entrez votre ville, l'activité de votre choix et votre email</div>

            <div class="col-md-12 row student-get-interest">
                <div class="col-md-2"></div>
                <div class="student-input  col-md-3">
                    <input type="text" class="home-search-input " placeholder="Ville">
                </div>
                <div class="student-input  col-md-3">

                    <input type="text" class="home-search-input " placeholder="Activité">
                </div>
                <div class="student-input  col-md-3 ">

                    <input type="text" class="home-search-input " placeholder="Email">
                </div>
            </div>

            <div class="student-presentation well-get-in-touch">Nous vous contacterons dès que des professeurs dans la
                matière de votre choix
                seront disponibles.
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

        $("#student-btn").click(function () {
            $('html, body').animate({
                scrollTop: $("#student").offset().top
            }, 1500);
        });

    </script>

    @include('includes.gmaps.autocomplete')

@endsection

