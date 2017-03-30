@extends('layouts.master')
@section('content')
    {!! HTML::script("js/awesomplete/awesomplete.min.js")!!}
    {!! HTML::style("temp-css/awesomplete.css") !!}
    {!! HTML::style("temp-css/loader.css") !!}
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=fr-FR&key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
    {!! HTML::script("js/jquery.geocomplete.min.js") !!}
    {!! HTML::script("js/jquery.form.min.js") !!}

    <div class="home-search">

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

                    <input type="hidden" class="autocomplete-current-page" value="{{$adverts->currentPage()}}"
                           name="page">
            </div>
            </form>
        </div>
    </div>
    </div>
    <div class="section section-odd home-profs">
        <div class="wrapper">

            <div class="home-profs-items-container">

                <div class="search-options col-md-3">
                    <div class="sorting-field col-md-12 topmargin-sm">
                        <label>Trier par</label>
                        <select name="sortBy" class="autocomplete-input-sortby">
                            <option value="distance">Distance</option>
                            <option value="date">Date</option>
                            <option value="price">Prix</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div id="teacher_gender" class="topmargin-sm teacher_gender">
                            <h3>Je préfère un professeur:</h3>
                            <label class="col-md-8">
                                <input name="gender" value="man" type="radio"> Homme
                            </label>
                            <label class="col-md-8">
                                <input name="gender" value="woman" type="radio"> Femme
                            </label>
                            <label class="col-md-10">
                                <input name="gender" value="both" type="radio"> Les deux me vont
                            </label>
                        </div>
                    </div>
                </div>

                @if(count($adverts) == 0)
                    <div class="count_results" class="bottommargin-sm col-md-9">
        <span id="count_text">{{ $adverts->total() }} Professeur{{$adverts->total() > 1 ? 's' : ''}}
            trouvés {{$selectedSubject ? "pour $selectedSubject" : ''}} {{isset($selectedCity) ? "à " . explode(',',$selectedCity)[0] : ''}} </span>
                    </div>
                    <div id="search_results" class="col-md-9">
                        <div>Malheuresement aucune annonce correspondant à vos critères n'a été trouvée. Réessayez avec
                            d'autres options
                        </div>
                    </div>
                @else
                    <div class="count_results" class="bottommargin-sm col-md-9">
        <span id="count_text">{{ $adverts->total() }} Professeur{{$adverts->total() > 1 ? 's' : ''}}
            trouvés {{$selectedSubject ? "pour $selectedSubject" : ''}} {{isset($selectedCity) ? "à " . explode(',',$selectedCity)[0] : ''}} </span>
                    </div>
                    <div id="search_results" class="col-md-9">
                        @include('main.multipleAdvertPreview')
                    </div>
                @endif
            </div>

            <div id="loader" class='loader-animation-css show' style='-webkit-transform:scale(0.21)'>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <!-- optional to show advert count  -->
        </div>
    </div>

    @include('includes.gmaps.autocomplete')
    @include('includes.awesomeplete.diacritics')


    <script>
        $(document).ready(function () {
            $("#loader").removeClass('show');

            function updatePage(data) {
                $("#search_results").html(data.results);
                $("#search_subject").html(data.params.selectedSubject);

                var searchText = '';

                if (data.params.city) $("#search_city").html('à ' + data.params.city);

                if (data.params.selectedSubject) {
                    searchText = data.count + ' Professeurs trouvés pour ' + data.params.selectedSubject;
                }

                if (data.params.city) {
                    searchText += ' à ' + data.params.city;
                }

                $("#count_text").html(searchText);

                $("#loader").removeClass('show');
            }

            var sendFormBy = function sortBySendForm(page) {

                function sendForm(event) {
                    if (event) event.preventDefault();

                    var subject = $(".autocomplete-input-subject").val();
                    var city = $(".autocomplete-input-city").val();
                    var token = $("[name='_token']").val();
                    var sortBy = $(".autocomplete-input-sortby").val();
                    var gender = $("[name='gender']:checked").val();
                    var lng = $("#longitude").val();
                    var lat = $("#latitude").val();

                    toastr.options.positionClass = "toast-top-full-width";
                    toastr.options.preventDuplicates = true;

                    if (subject.length < 1) {
                        toastr.info("Veuillez saisir une matière");
                        return;
                    }

                    if (city.length < 1) {
                        toastr.info("Veuillez sélectionner une ville");
                        return;
                    }

                    $("#loader").addClass('show');

                    $.post('/search',
                            {
                                'subject': subject,
                                'city': city,
                                '_token': token,
                                'sortBy': sortBy,
                                'gender': gender,
                                'lng': lng,
                                'lat': lat,
                                'page': page ? page.replace(/[^0-9]/g, '') : null
                            },
                            function (data) {
                                updatePage(data);
                            });
                };
                return sendForm;
            };

            $(document).on('click', '.home-search-submit', sendFormBy(null));

            $(".autocomplete-input-sortby, .teacher_gender").change(sendFormBy(null));

            $(document).on("click", '.pagination-link', function (event) {
                sendFormBy($(this).attr('href'))(event);
            });

            gmaps.config.submitCallBack = sendFormBy();

            new Awesomplete(document.getElementById('subject_input'), {
                filter: function (text, input) {
                    return new RegExp("^" + removeDiacritics(input.trim()), "i").test(removeDiacritics(text));
                }
            });

        });
    </script>


@endsection
