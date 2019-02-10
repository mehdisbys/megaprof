@extends('layouts.master')

@section('content')
    {!! HTML::style("css/awesomplete.css") !!}
    {!! HTML::style("css/fa/css/font-awesome.min.css") !!}
    {!! HTML::style("css/slick.css") !!}
    {!! HTML::style("css/slick-theme.css") !!}

    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=fr-FR&key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
    {!! HTML::script("js/jquery.vticker.min.js")!!}

    <style>
        /* fade in */
        #quote-message-container .animated {
            opacity: 0;
            list-style: none;
        }

        #quote-message-container .animated.search_prof {
            -webkit-animation: fade 2s ease-in-out forwards;
            -webkit-animation-delay: 1s;
            -moz-animation: fade 2s ease-in-out forwards;
            -moz-animation-delay: 1s;
            -o-animation: fade 2s ease-in-out forwards;
            -o-animation-delay: 1s;
            animation: fade 2s ease-in-out forwards;
            animation-delay: 1s;
        }

        #quote-message-container .animated.find_prof {
            -webkit-animation: fade 2s ease-in-out forwards;
            -webkit-animation-delay: 2.5s;
            -moz-animation: fade 2s ease-in-out forwards;
            -moz-animation-delay: 2.5s;
            -o-animation: fade 2s ease-in-out forwards;
            -o-animation-delay: 2.5s;
            animation: fade 2s ease-in-out forwards;
            animation-delay: 2.5s;
        }

        #quote-message-container .animated.book_prof {
            -webkit-animation: fade 2s ease-in-out forwards;
            -webkit-animation-delay: 4s;
            -moz-animation: fade 2s ease-in-out forwards;
            -moz-animation-delay: 4s;
            -o-animation: fade 2s ease-in-out forwards;
            -o-animation-delay: 4s;
            animation: fade 2s ease-in-out forwards;
            animation-delay: 4s;
        }

        #quote-message-container .animated.learn {
            -webkit-animation: fade 2s ease-in-out forwards;
            -webkit-animation-delay: 5.5s;
            -moz-animation: fade 2s ease-in-out forwards;
            -moz-animation-delay: 5.5s;
            -o-animation: fade 2s ease-in-out forwards;
            -o-animation-delay: 5.5s;
            animation: fade 2s ease-in-out forwards;
            animation-delay: 5.5s;
        }

        #quote-message-container animated.github {
            -webkit-animation: fade 2s ease-in-out forwards;
            -webkit-animation-delay: 7s;
            -moz-animation: fade 2s ease-in-out forwards;
            -moz-animation-delay: 7s;
            -o-animation: fade 2s ease-in-out forwards;
            -o-animation-delay: 7s;
            animation: fade 2s ease-in-out forwards;
            animation-delay: 7s;
        }

        li.instagram {
            -webkit-animation: fade 2s ease-in-out forwards;
            -webkit-animation-delay: 8.5s;
            -moz-animation: fade 2s ease-in-out forwards;
            -moz-animation-delay: 8.5s;
            -o-animation: fade 2s ease-in-out forwards;
            -o-animation-delay: 8.5s;
            animation: fade 2s ease-in-out forwards;
            animation-delay: 8.5s;
        }

        li.linkedin {
            -webkit-animation: fade 2s ease-in-out forwards;
            -webkit-animation-delay: 10s;
            -moz-animation: fade 2s ease-in-out forwards;
            -moz-animation-delay: 10s;
            -o-animation: fade 2s ease-in-out forwards;
            -o-animation-delay: 10s;
            animation: fade 2s ease-in-out forwards;
            animation-delay: 10s;
        }

        @-webkit-keyframes fade {
            100% { opacity: 1; }
        }

        @-moz-keyframes fade {
            100% { opacity: 1; }
        }

        @-o-keyframes fade {
            100% { opacity: 1; }
        }

        @keyframes fade {
            100% { opacity: 1; }
        }

        .presentation-icons {
            width: 45%;
        }
    </style>

    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>


    <!-- one ============= -->
    <div class="home-search medium-height-plus">

        <h1 class="search-title">Apprenez sans limites</h1>
        <h4 class="text-center" style="color: white">Activités et cours de soutien entre particuliers</h4>

        <div id="matieres" class="matieres-scroller hidden" style="color: white">
            <ul style="list-style: none">
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


        <div class="home-search-form-inner autocomplete awesomplete">
            <div class="search-form-wrapper">
                <form action="/search" method="post" id="search_form">
                    {!! csrf_field() !!}
                    <div class="home-search-field-wrapper">
                        <input
                                id="subject_input"
                                class="awesomplete home-search-input autocomplete-input-subject"
                                placeholder="Que souhaitez-vous apprendre ?"
                                data-minchars="1"
                                data-autofirst="1"
                                data-list="{!! $subsubjects !!}"
                                name="subject"
                                type="text"
                                autocomplete="off"
                                aria-autocomplete="list"
                                value="{{$selectedSubject or ''}}"/>
                    </div>

                    <div class="home-search-field-wrapper">
                        <input
                                id="location_input"
                                class="home-search-input autocomplete-input-city"
                                placeholder="Ville où le cours a lieu"
                                name="city" type="text" value="{{$selectedCity or ''}}"/>
                    </div>

                    <div class="home-search-button-wrapper ">
                        <button id="submit-btn" class="button home-search-submit" type="submit"> Chercher</button>
                    </div>

                    <div class="location-details no-visibility">
                        {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
                        {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
                    </div>
                </form>
            </div>
        </div>



        <div class="home-search-form-inner autocomplete">
        </div>
        <!-- <div id="howto-btn" class="howto"><a href="#howto" class="howto-link">Comment ça marche</a></div> -->
    </div>

    <div class="col-md-12 text-center mini-padding-top-when-mobile ">
        @include('includes.facebook.likeButton')

    </div>

    <div class="col-md-12 text-center mini-padding-top-when-mobile ">
        <div class="clearfix"></div>
        <a class="button button-dp-blue" href="/professeur">Je veux donner des cours</a>
    </div>


    @include('main.latestPublishedAdverts')


    <div class="col-md-12">
        <div class="wrapper">
            <div class="connection-form">
                <form id="loginForm" role="form" method="POST" action="/login" class="component-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="form-wrapper">
                        <a class="facebook-connect" href="/redirect">Connexion avec Facebook</a>
                    </div>
                </form>
                <a href="/inscription">Connexion avec email</a>
            </div>
        </div>


        <script>
            function submitForm(response)
            {
                $('#loginForm').submit();
            }
        </script>
    </div>


    <div class="student-info col-md-12" id="student-info-div">
        <div class="wraper">
            <div class="home-hare-opinion">
                <div class="col-md-12"><h2 class="section-title">Trouver un professeur au Maroc, c'est facile !</h2></div>
                <div class="topmargin-big col-md-12">
                    <div class="col-md-12" id="quote-message-container">
                        <ul>
                            <li class="col-md-3 hidden topmargin-lg-when-mobile search_prof">
                                <div class="col-md-12" data-tooltip="En un clic, Taelam vous

                                    propose une liste de professeurs

                                    et d’activités multiples pour tous

                                    les goûts et les budgets près de

                                    chez vous
                                ">
                                    <img class="presentation-icons" src="/images/icons/009-web-page.svg" alt="">
                                </div>
                                <div class="col-md-12">Découvrez des activités et des professeurs partout au Maroc</div>

                            </li>


                            <li class="col-md-3 hidden topmargin-lg-when-mobile when-mo find_prof">
                                <div class="col-md-12" data-tooltip="Choisissez des professeurs

                                    sélectionnés et vérifiés par nos

                                    soins. Fixez vos objectifs avec votre

                                    professeur et atteignez-les grâce à

                                    un suivi personnalisé
                                ">
                                    <img class="presentation-icons" src="/images/icons/047-chat.svg" alt="">
                                </div>
                                <div class="col-md-12">Trouvez parmi les professeurs sélectionnés, votre professeur
                                </div>

                            </li>
                            <li class="col-md-3 hidden topmargin-lg-when-mobile book_prof">
                                <div class="col-md-12" data-tooltip="Après avoir sélectionné une

                                    matière et un lieu, réservez

                                    un cours avec le professeur

                                    qui correspond le mieux à

                                    vos attentes
                                ">
                                    <img class="presentation-icons" src="/images/icons/teamwork.svg" alt="">
                                </div>
                                <div class="col-md-12">Réservez votre activité</div>

                            </li>

                            <li class="col-md-3 hidden topmargin-lg-when-mobile learn">
                                <div class="col-md-12" data-tooltip="Apprenez, échangez

                                    ou perfectionnez vos

                                    connaissances
                                ">
                                    <img class="presentation-icons" src="/images/icons/020-like-1.svg" alt="">
                                </div>
                                <div class="col-md-12">

                                    <div class="col-md-12">Commencez à apprendre !</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 topmargin-big">



            <div>
                @include('main.why-choose-taelam')
            </div>
        </div>
    </div>

    {!! HTML::script("js/slick.min.js") !!}
    {!! HTML::script("js/jquery.form.min.js") !!}
    {!! HTML::script("js/parsley.min.js")!!}
    {!! HTML::script("js/awesomplete/awesomplete.min.js")!!}

    <!-- five ============= -->
    @include('includes.awesomeplete.diacritics')

    <script>

        $(window).scroll(function () {
            var y = $(window).scrollTop(),
                x = $('#quote-message-container').offset().top - 650;
            if (y > x) {
                console.log($(window).scrollTop());
                $('.hidden').addClass('animated').removeClass('hidden');
            }
        });

        $(document).ready(function () {


            $('.carousel').slick({
                autoplay: true,
                autoplaySpeed: 4500,
                arrows: false,
                dots: true,
                cssEase: 'linear'
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
                //this.submit();

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
                }
            });
        });

        $("#student-btn").click(function () {
            $('html, body').animate({
                scrollTop: $("#quote-message-container").offset().top
            }, 1500);
        });

        $(function () {
            $('#matieres').removeClass('hidden');
            $('#matieres').vTicker('init', {pause: 2000, mousePause: false});
        });


    </script>

    @include('includes.gmaps.autocomplete')

@endsection

