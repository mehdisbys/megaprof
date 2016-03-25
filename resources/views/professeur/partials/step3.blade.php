
{!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;language=fr-FR') !!}
{!! HTML::script("js/locationpicker.jquery.js") !!}
{!! HTML::script("js/jquery-ui.js")!!}

{{dd(get_defined_vars();}}

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

    {!! Form::hidden('longitude',null, ['id' => 'longitude']) !!}
    {!! Form::hidden('latitude', null, ['id' => 'latitude']) !!}
    {!! Form::hidden('address',  null, ['id' => 'address']) !!}
    {!! Form::hidden('city',     null, ['id' => 'city']) !!}
    {!! Form::hidden('region',   null, ['id' => 'region']) !!}
    {!! Form::hidden('postcode', null, ['id' => 'postcode']) !!}
    {!! Form::hidden('country',  null, ['id' => 'country']) !!}

    <div class="ck-button col-md-12 col-md-offset-2">
        <?php $can_receive = isset($advert) ? $advert->can_receive : null; ?>

        {!! Form::input('checkbox','can_receive', null,['class' => 'no-display', 'id' => 'can_receive',
        'checked' => $can_receive]) !!}
        <label for='can_receive' class="topmargin-sm">
            <span>Je peux recevoir mes élèves</span>
        </label>
    </div>

    <div class="ck-button col-md-12 col-md-offset-2">
        <?php $can_travel = isset($advert) ? $advert->can_travel : null; ?>

        {!! Form::input('checkbox','can_travel',null,['class' => 'no-display', 'id' => 'can_travel',
        'checked' => $can_travel]) !!}
        <label for='can_travel' class="topmargin-sm">
            <span>Je peux me déplacer</span>
        </label>
    </div>

    <?php $travel_radius = isset($advert) ? $advert->travel_radius : null; ?>

    <div class="col-md-12 topmargin-sm no-visibility" id="map-and-radius">
        <div class="col-md-4">
            Radius: <div id="radius"></div>
            <input type="text" name="radius" id="radius-hidden" value="{{$travel_radius}}" hidden>
        </div>

        <div class="col-md-8">
            <div class="col-md-12">&nbsp;</div>
            <div id="map" style="width: 100%; height: 300px;"></div>
        </div>
    </div>

    <div class="ck-button col-md-12 col-md-offset-2">
        <?php $can_webcam = isset($advert) ? $advert->can_webcam : null; ?>

        {!! Form::input('checkbox','can_webcam',null,['class' => 'no-display', 'id' => 'can_webcam',
        'checked' => $can_webcam ]) !!}

        <label for='can_webcam' class="topmargin-sm">
            <span>Je peux donner des cours par webcam</span>
        </label>
    </div>
    <script>
        $(document).ready(function() {

            function updateControls(addressComponents) {
                $('#address').val(addressComponents.addressLine1);
                $('#city').val(addressComponents.city);
                $('#region').val(addressComponents.stateOrProvince);
                $('#postcode').val(addressComponents.postalCode);
                $('#country').val(addressComponents.country);
            }

            $("#can_travel").change(function(){

                if($("#can_travel").prop('checked'))
                    $("#map-and-radius").removeClass('no-visibility');
                else
                    $("#map-and-radius").addClass('no-visibility');

            });

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
                location: {latitude: 0, longitude: 0},
                radius: 1000,
                zoom: 12,
                inputBinding: {
                    radiusInput: $('#radius-hidden'),
                    locationNameInput: $('#location')
                },
                enableAutocomplete: true,
                onlocationnotfound: null,
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

                    $("#latitude").val(currentLocation.latitude);
                    $("#longitude").val(currentLocation.longitude);
                    var addressComponents = $(this).locationpicker('map').location.addressComponents;
                    updateControls(addressComponents);
                }
            });

            $("#radius").slider({
                //  orientation: 'vertical',
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
<div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
    <button type="submit" class="button button-3d button-large button-rounded button-green">
        J'ai défini où se dérouleront mes cours
    </button>
</div>

{!! Form::close() !!}
