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
            <div class="col-md-3 col-md-offset-3"><a id="student-btn" href="#student" class="btn-welcome btn-student" >Trouver un Professeur</a></div>
            <div class="col-md-3"><a href="/professeur" class="btn-welcome btn-teacher ">Donner des Cours</a></div>
        </div>

        <div class="home-search-form-inner autocomplete">
        </div>
        <!-- <div id="howto-btn" class="howto"><a href="#howto" class="howto-link">Comment ça marche</a></div> -->
    </div>

    <div class="topmargin-big">
        <div class="wraper">
            <div class="home-share-pinion col-md-12">
                <h2 class="section-title">Apprendre en profondeur avec le Dr. Chayoub</h2>
                <a href="/etudiant">
                    <div class="col-md- student-welcome"></div>
                </a>
                <a href="/professeur">
                    <div class="col-md- teacher-welcome"></div>
                </a>
            </div>
        </div>
    </div>

    <div class="topmargin-big">
        <div class="wraper">
            <div class="home-share-pinion col-md-12">
                <h2 id="student" class="section-title">Plateforme de partage de connaissances entre particuliers</h2>
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

