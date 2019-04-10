<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Labels</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 425px;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=fr-FR&key=AIzaSyBMbqBykgfCFr3pgcj0dRU6rlmSggAZygc') !!}

    <script>
        var markers = [{
            "lat": 30.9320099,
            "lng": -6.9005277,
            "count": 12,
            "count(location_lat)": 12
        }, {"lat": "30.4179615", "lng": "-9.5761529", "count": 8, "count(location_lat)": 8}, {
            "lat": "33.5778450",
            "lng": "-7.5650926",
            "count": 8,
            "count(location_lat)": 8
        }, {"lat": "33.8924092", "lng": "-5.5333516", "count": 8, "count(location_lat)": 8}, {
            "lat": "33.9745807",
            "lng": "-6.8534789",
            "count": 8,
            "count(location_lat)": 8
        }, {"lat": "35.1701412", "lng": "-5.2676925", "count": 7, "count(location_lat)": 7}, {
            "lat": "31.5112891",
            "lng": "-9.7697538",
            "count": 6,
            "count(location_lat)": 6
        }, {"lat": "31.6343495", "lng": "-8.0107428", "count": 5, "count(location_lat)": 5}, {
            "lat": "30.4108647",
            "lng": "-9.5964080",
            "count": 5,
            "count(location_lat)": 5
        }, {"lat": "33.9922331", "lng": "-6.8460765", "count": 5, "count(location_lat)": 5}, {
            "lat": "33.5724320",
            "lng": "-7.5973439",
            "count": 5,
            "count(location_lat)": 5
        }, {"lat": "34.6829989", "lng": "-1.8827802", "count": 4, "count(location_lat)": 4}, {
            "lat": "35.7721730",
            "lng": "-5.8300080",
            "count": 4,
            "count(location_lat)": 4
        }, {"lat": "31.5936190", "lng": "-8.0301570", "count": 3, "count(location_lat)": 3}, {
            "lat": "35.7755361",
            "lng": "-5.8003769",
            "count": 3,
            "count(location_lat)": 3
        }, {"lat": "35.7607175", "lng": "-5.8336544", "count": 3, "count(location_lat)": 3}, {
            "lat": "34.0219933",
            "lng": "-5.0115126",
            "count": 3,
            "count(location_lat)": 3
        }, {"lat": "33.9646175", "lng": "-6.8938290", "count": 2, "count(location_lat)": 2}, {
            "lat": "33.5914950",
            "lng": "-7.6012452",
            "count": 1,
            "count(location_lat)": 1
        }]

        function initialize() {
            var casablanca = {lat: 33.589886, lng: -7.603869};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: casablanca
            });

            // Add a marker at the center of the map.
            addMarkers(markers, map);
        }


        function addMarkers(markers, map) {
            for (var i = 0; i < markers.length; i++) {
                addMarker(markers[i], map)
            };
        }

        // Adds a marker to the map.
        function addMarker(location, map) {
            new google.maps.Marker({
                position: location,
                label: "12",
                map: map
            });
        }

        // $.get('/ads-per-cities', function (data) {
        //     addMarkers(data);
        // });
        // }
        // ;

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
<div id="map"></div>
</body>
</html>