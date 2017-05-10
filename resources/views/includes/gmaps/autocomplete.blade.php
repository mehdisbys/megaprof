<script>
    var gmaps = {

        init: function (settings) {
            gmaps.config = {
                noPredictionsMsg: "Aucune ville ne correspond à votre saisie",
                locationInput: 'location_input',
                locationDetails: '',
                formID: 'search_form',
                submitCallBack: null,
                types: ['(cities)'],
                latitude : 'latitude',
                longitude : 'longitude',
                fillLocationDetails : true
            };

            $.extend(gmaps.config, settings);

            gmaps.setup();
        },

        predictions: 0,

        autocomplete: new google.maps.places.AutocompleteService(),

        displaySuggestions: function (predictions, status) {
            gmaps.predictions = predictions ? predictions.length : 0;

            if (status != google.maps.places.PlacesServiceStatus.OK) {
                toastr.options.preventDuplicates = true;
                toastr.info(gmaps.config.noPredictionsMsg);
            }
        },

        setup: function () {

            var autocomplete = new google.maps.places.Autocomplete(document.getElementById(gmaps.config.locationInput), {
                types: gmaps.config.types,
                componentRestrictions: {country: "ma"},
                details: '.toto'
            });

            autocomplete.addListener('place_changed', function () {

                if (gmaps.config.fillLocationDetails === true )
                {
                var place = autocomplete.getPlace();

                var latitude  = document.getElementById(gmaps.config.latitude);
                var longitude = document.getElementById(gmaps.config.longitude);
                var loc_name  = document.getElementById('locality');

                if (latitude)
                    latitude.value = place.geometry.location.lat();

                if (longitude)
                    longitude.value = place.geometry.location.lng();

                if (loc_name)
                    loc_name.value = place.name;
                }
            });

            $("#" + gmaps.config.locationInput).on('keyup', function () {
                if ($(this).val()) {
                    gmaps.autocomplete.getPlacePredictions({
                        input: $(this).val(),
                        types: gmaps.config.types,
                        componentRestrictions: {country: "ma"}
                    }, gmaps.displaySuggestions)
                }
            });

            var submitForm = function (event) {
                if (gmaps.predictions < 1) {
                    event.preventDefault();
                    toastr.options.positionClass = "toast-top-full-width";
                    toastr.options.preventDuplicates = true;
                    toastr.info(gmaps.config.noPredictionsMsg);
                    return;
                }
                if (gmaps.config.submitCallBack) {
                    gmaps.config.submitCallBack();
                }
            };

            $("#" + gmaps.config.formID).submit(submitForm);
        }
    };
    $(document).ready(gmaps.init);

</script>