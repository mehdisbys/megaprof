<script>
    var gmaps = {

        init: function (settings) {
            gmaps.config = {
                noPredictionsMsg  : "Aucune ville ne correspond à votre saisie",
                locationInput     : 'location_input',
                locationDetails   : '.location-details',
                formID            : 'search_form',
                submitCallBack    : null
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
                return;
            }
        },

        setup: function () {

            var autocomplete = new google.maps.places.Autocomplete(document.getElementById(gmaps.config.locationInput), {
                types: ['(cities)'],
                componentRestrictions: {country: "ma"},
                details: gmaps.config.locationDetails
            });

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();

                $("#" + gmaps.config.formID).submit();});

            $("#location_input").on('keyup', function () {
                if ($(this).val()) {
                    gmaps.autocomplete.getPlacePredictions({
                        input: $(this).val(),
                        types: ['(cities)'],
                        componentRestrictions: {country: "ma"}
                    }, gmaps.displaySuggestions)
                }
            });

            var submitForm = function (event) {
                event.preventDefault();
                toastr.options.positionClass = "toast-top-full-width";
                toastr.options.preventDuplicates = true;

                if (gmaps.predictions < 1) {
                    toastr.info(gmaps.config.noPredictionsMsg);
                    return;
                }
                if(gmaps.config.submitCallBack){
                    gmaps.config.submitCallBack();
                }
            };

            $("#" + gmaps.config.formID).submit(submitForm);
        }
    };
    $(document).ready(gmaps.init);

</script>