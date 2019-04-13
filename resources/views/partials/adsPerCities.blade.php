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
            height: 305px;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

    <script>
        var markers = [];
        $.get("/ads-per-cities", function(data, status){
            markers = $.parseJSON(data);
        });
        var activeInfoWindow;
        var doneMarkers = [];

        function initialize() {
            var casablanca = {lat: 32.389886, lng: -8.603869};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6 ,
                center: casablanca,
                disableDefaultUI: true
            });

            // Add a marker at the center of the map.
            addMarkers(markers, map);

            // var markerCluster = new MarkerClusterer(map, doneMarkers,
            //     {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
        }


        function addMarkers(markers, map) {
            for (var i = 0; i < markers.length; i++) {
                addMarker(markers[i], map)
            }
            ;
        }

        // Adds a marker to the map.
        function addMarker(location, map) {
            var position = {"lat": parseFloat(location.lat), "lng": parseFloat(location.lng)}
            var marker = new google.maps.Marker({
                position: position,
                title: location.title,
                animation: google.maps.Animation.DROP,
                map: map
            });
            var infowindow = new google.maps.InfoWindow({
                content: location.title
            });

            marker.addListener('click', function () {
                if (activeInfoWindow) {
                    activeInfoWindow.close();
                }
                infowindow.open(map, marker);
                activeInfoWindow = infowindow;
            });
            doneMarkers.push(marker);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
<div id="map"></div>
</body>
</html>