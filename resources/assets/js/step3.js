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
            fillColor: '#fd875e',
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

    // gmaps.config.locationInput = 'location';
    // gmaps.config.formID = 'location_form';
    gmaps.init({
        locationInput: 'location',
        formID: 'location_form',
        latitude: 'lat',
        longitude: 'lng',
        types: [],
        noPredictionsMsg: 'Aucun lieu ne correspond à votre saisie'
    });

});
