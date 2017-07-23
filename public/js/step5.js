$(document).ready(function() {

    var updatePrices = function(inputs, price) {
        inputs.forEach(function(el){
            return updateField(el,minus_percentage,price);
        });
    };

    var updatePriceTravel = function(price){
        var supp = checkInt($("#price_travel_percentage").val());
        $("#price_travel_span").text(parseInt(supp) + price);
        $("#price_travel").val(parseInt(supp) + price);
    };

    var listenFields = function(fields){

        fields.forEach(listenField);

        $("#price_travel_percentage").on('change keyup', function(){
            updatePriceTravel(parseInt(getBasicPrice()));
        });
    };

    var listenField = function (field){

        $(field + "_percentage").on('change keyup',function(){
            price = getBasicPrice();
            updateField(field, minus_percentage, price);
        });
    };

    var updateField = function( el, func, price){
        var percent = checkInt($(el + "_percentage").val());
        percent = percent ? percent : 0;
        var times = el.split('_')[1];
        if(checkInt(times) == false) times = 1 ;

        $(el + "_span").text(Math.floor(func(price, percent) * times));
        $(el + "_total").text(Math.floor(func(price, percent) * times));
        $(el).val(Math.floor(func(price, percent) * times));
    };

    var getBasicPrice = function(){return checkInt($("#price").val())};

    var minus_percentage = function (value, percentage){
        localPercentage =  (value - ((value * percentage)/100));
        return Math.floor(localPercentage);
    };

    function checkInt(value) {
        var x = parseFloat(value);
        if(!isNaN(value) && (x | 0) === x)
            return value;
        return 0;
    }

    var toggleDisplays = function(inputs){

        inputs.forEach(toggleDisplay);
    };

    var toggleDisplay = function(el){

        $(el).on('change', function(){
            if($(el).prop('checked'))
                $(el + "_display").removeClass('no-visibility');
            else
                $(el + "_display").addClass('no-visibility');
        });
    };

    //--------

    var inputs = ["#price_webcam", "#price_5_hours", "#price_10_hours"];

    var __process = function(){
        var price = checkInt($(this).val());
        updatePrices(inputs, price);
        updatePriceTravel(parseInt(price));
    };

    $("#price").on('change keyup load', __process);

    $("#price").trigger('change');

    listenFields(inputs);

    toggleDisplays(["#price_travel_supp","#price_webcam_bool","#price_degressive"]);

    $('#price').parsley()
        .on('field:validated', function () {

            var ok = $('.parsley-error').length === 0;

            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function () {
            return true;
        });
});

//# sourceMappingURL=step5.js.map
