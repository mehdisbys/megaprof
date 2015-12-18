@extends('layouts.master')

@section('content')

    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;') !!}
    {!! HTML::script("js/locationpicker.jquery.js") !!}
    {!! HTML::style("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css") !!}
    {!! HTML::script("//code.jquery.com/ui/1.11.4/jquery-ui.js")!!}
    {!! Form::open(['url' => '/nouvelle-annonce-2']) !!}

    <div class="col-md-6 col-md-offset-3">


        <h2>Lieux des cours et Modalités</h2>

        <label for='location' class="topmargin-sm">Où se dérouleront vos cours ?</label>
        {!! Form::input('text','location',null,['class' => 'alert_location sm-form-control', 'id' => 'location']) !!}

        <div class="ck-button col-md-12 col-md-offset-2">
            {!! Form::input('checkbox','can_receive',null,['class' => 'no-display', 'id' => 'can_receive']) !!}
            <label for='can_receive' class="topmargin-sm">
                <span>Je peux recevoir mes élèves</span>
            </label>
        </div>

        <div class="ck-button col-md-12 col-md-offset-2">
            {!! Form::input('checkbox','can_travel',null,['class' => 'no-display', 'id' => 'can_travel']) !!}
            <label for='can_travel' class="topmargin-sm">
                <span>Je peux me déplacer</span>
            </label>
        </div>

        <div class="ck-button col-md-12 col-md-offset-2">
            {!! Form::input('checkbox','can_webcam',null,['class' => 'no-display', 'id' => 'can_webcam']) !!}
            <label for='can_webcam' class="topmargin-sm">
                <span>Je peux donner des cours par webcam</span>
            </label>
        </div>

        <script>

        </script>

        <div class="col-md-12 topmargin-sm">
            <div class="col-md-4">
                Radius: <div id="radius"></div>
                <input type="text" id="radius-hidden" value="" hidden>
            </div>

            <div class="col-md-8">
                <div class="col-md-12">&nbsp;</div>
                <div id="map" style="width: 100%; height: 300px;"></div>
            </div>

            <script>
                $(document).ready(function() {
                    $("#radius").slider({
                        value: 1000,
                        min: 1000,
                        max: 20000,
                        step: 1000,
                        slide: function (event, ui) {
                            $("#radius-hidden").val(ui.value);
                            $('#radius-hidden').trigger('change');
                        }
                    });

                    $('#map').locationpicker({
                        location: {latitude: 48.864716, longitude: 2.349014},
                        radius: 1000,
                        zoom: 12,
                        inputBinding: {
                            radiusInput: $('#radius-hidden'),
                            //radiusInput: $('#radius-input'),
                            locationNameInput: $('#location')
                        },
                        enableAutocomplete: true,
                        onchanged: function(currentLocation, radius, isMarkerDropped) {
                            var mapContext = $(this).locationpicker('map');

                            if (4000 > radius)
                                mapContext.map.setZoom(12);

                            if ( 6000 > radius && radius >= 4000)
                                mapContext.map.setZoom(11);

                            if ( 10000 > radius && radius >= 6000)
                                mapContext.map.setZoom(10);

                            if (13000 <= radius)
                                mapContext.map.setZoom(9);
                        }
                    });


                    $("#radius").slider({
                        orientation: 'vertical',
                        value: 3000,
                        min: 1000,
                        max: 20000,
                        step: 1000,
                        slide: function (event, ui) {
                            $("#radius-hidden").val(ui.value).trigger("change");
                        }
                    });
                });
            </script>
        </div>
    </div>

    <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
        <button type="submit" class="button button-3d button-large button-rounded button-green">
            J'ai défini où se dérouleront mes cours
        </button>
    </div>

    {!! Form::close() !!}




@endsection