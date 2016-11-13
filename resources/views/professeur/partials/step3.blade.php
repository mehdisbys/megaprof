
{!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR&amp;key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}
{!! HTML::script("js/jquery.geocomplete.min.js") !!}
{!! HTML::script("js/jquery-ui.js")!!}
{!! HTML::style("css/fa/css/font-awesome.css") !!}


@if(isset($advert) and isset($advert_id))
    {!! Form::open(['url' => "/modifier-annonce-3/{$advert_id}"]) !!}
@else
    {!! Form::open(['url' => '/nouvelle-annonce-3']) !!}
@endif

<div class="col-md-6 col-md-offset-3">

    <h2>Lieux des cours et Modalités</h2>

    <label for='location' class="topmargin-sm">Où se dérouleront vos cours ?</label>
    {!! Form::hidden('advert_id', $advert_id) !!}

    <?php $location = isset($advert) ? $advert->location_street .','. $advert->location_city : null; ?>

    @if(isset($advert))
        <div class="address"><strong>Addresse :</strong> {{  $advert->location_street }} </div>
        <div class="address"><strong>Code Postal :</strong> {{  $advert->location_postcode }} </div>
        <div class="address"><strong>Ville :</strong> {{  $advert->location_city }} </div>
        <div class="address"><strong>Pays :</strong> {{  $advert->location_country }} </div>

    @else
        {!! Form::input('text','location',$location,['class' => 'alert_location sm-form-control', 'id' => 'location']) !!}
    @endif

    <div class="location-details no-visibility">

    {!! Form::hidden('lng',null, ['id' => 'lng']) !!}
    {!! Form::hidden('lat', null, ['id' => 'lat']) !!}
    {!! Form::hidden('formatted_address',  null, ['id' => 'formatted_address']) !!}
    {!! Form::hidden('administrative_area_level_1', null, ['id' => 'administrative_area_level_1']) !!}
    {!! Form::hidden('locality',   null, ['id' => 'locality']) !!}
    {!! Form::hidden('postal_code', null, ['id' => 'postal_code']) !!}
    {!! Form::hidden('country',  null, ['id' => 'country']) !!}
    </div>

    <div class="ck-button col-md-6">
        <?php $can_webcam = isset($advert) ? $advert->can_webcam : null; ?>

        {!! Form::input('checkbox','can_webcam',null,['class' => 'no-display', 'id' => 'can_webcam',
        'checked' => $can_webcam ]) !!}

        <label for='can_webcam' class="topmargin-sm">
            <span><span class="fa fa-video-camera"></span> Je peux donner des cours par webcam</span>
        </label>
    </div>

    <div class="ck-button col-md-6">
        <?php $can_receive = isset($advert) ? $advert->can_receive : null; ?>

        {!! Form::input('checkbox','can_receive', null,['class' => 'no-display', 'id' => 'can_receive',
        'checked' => $can_receive]) !!}
        <label for='can_receive' class="topmargin-sm">
            <span><span class="fa fa-home"></span> Je peux recevoir mes élèves</span>
        </label>
    </div>

    <div class="ck-button col-md-6 col-md-offset-3">
        <?php $can_travel = isset($advert) ? $advert->can_travel : null; ?>

        {!! Form::input('checkbox','can_travel',null,['class' => 'no-display', 'id' => 'can_travel',
        'checked' => $can_travel]) !!}
        <label for='can_travel' class="topmargin-sm">
            <span><span class="fa fa-taxi"></span> Je peux me déplacer</span>
        </label>
    </div>

    <?php $travel_radius = isset($advert) ? $advert->travel_radius : null; ?>

    <div class="col-md-12 topmargin-sm no-visibility" id="map-and-radius">
        <div class="col-md-4 form-group">
            Radius:
            <select id="radius" name="radius" class="form-control">
                <option value="1000" selected>1 Km</option>
                <option value="3000">3 Km</option>
                <option value="5000">5 Km</option>
                <option value="8000">8 Km</option>
                <option value="13000">13 Km</option>
                <option value="20000">20 Km</option>
            </select>
        </div>

        <div class="col-md-8">
            <div class="col-md-12">&nbsp;</div>
            <div id="map" style="width: 100%; height: 300px;"></div>
        </div>
    </div>


    <script>
        $(document).ready(function () {

            var circlesArray = [];
            var zoomLevels = {};
            zoomLevels['1000'] = 14;
            zoomLevels['3000'] = 12;
            zoomLevels['5000'] = 11;
            zoomLevels['8000'] = 11;
            zoomLevels['13000'] = 10;
            zoomLevels['20000'] = 9;

            var geo = $('#location').geocomplete({
                types: ['address'],
                componentRestrictions: {country: "ma"},
                map: "#map",
                mapOptions: {
                    center: {lat: 33.5, lng: -7.5},
                    zoom: 2
                },
                markerOptions: {
                    draggable: true
                },
                details: ".location-details"
            }).bind("geocode:result", function (event, result) {

                var map = $("#location").geocomplete("map");
                var marker = $("#location").geocomplete("marker");
                var radius = parseInt($('#radius').val());

                var circle = new google.maps.Circle({
                    map: map,
                    radius: parseInt($('#radius').val()),
                    fillColor: '#F79011',
                    fillOpacity: 0.65,
                    strokeWeight: 1
                });

                map.setZoom(zoomLevels[radius]);

                clearOverlays();
                circlesArray.push(circle);
                circle.bindTo('center', marker, 'position');
            });

            function clearOverlays() {
                for (var i = 0; i < circlesArray.length; i++) {
                    circlesArray[i].setMap(null);
                }
                circlesArray.length = 0;
            };

            $("#can_travel").change(function () {
                if ($("#can_travel").prop('checked'))
                    $("#map-and-radius").removeClass('no-visibility');
                else
                    $("#map-and-radius").addClass('no-visibility');
            });

            $('#radius').change(function () {
                geo.trigger('geocode:result');
            });
        });
    </script>
</div>
<div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
    <button type="submit" class="button button-3d button-large button-rounded button-green">
        J'ai défini où se dérouleront mes cours
    </button>
</div>

{!! Form::close() !!}
