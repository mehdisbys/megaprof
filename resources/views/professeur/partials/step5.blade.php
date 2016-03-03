
{!! HTML::script("js/parsley.min.js")!!}

@if(isset($advert))
    <form id="presentation-content"  accept-charset="UTF-8"
          action="/modifier-annonce-5/{{$advert->id}}" method="POST" data-parsley-validate>
        @else
            <form id="presentation-content"  accept-charset="UTF-8"
                  action="/nouvelle-annonce-5" method="POST" data-parsley-validate>
                @endif

                <form id="presentation-content"  accept-charset="UTF-8"
                      action="/nouvelle-annonce-5" method="POST" data-parsley-validate>

                    {!! csrf_field() !!}

                    {!! Form::hidden('advert_id', $advert_id) !!}

                    <h2 class="col-md-offset-3">Quel est le prix de vos cours ?</h2>

                    {!! Form::label('price',"Quel est le prix d'une heure de cours ?", ['class' => 'col-md-offset-3 col-md-9']) !!}

                    <div class="small col-md-offset-1 col-md-2"><em>Indiquez ici votre prix de base pour une heure de cours, sans réduction ni autre déduction</em></div>
                    <div class="col-md-2"></div>
                    <?php $price = isset($advert) ? $advert->price : null ?>
                    {!! Form::input('text', 'price', $price,['class' => 'sm-form-control small-input col-md-3 leftmargin-sm', 'id' => 'price']) !!}
                    <div class="col-md-3 small">&nbsp; Dirhams</div>

                    <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>

                    @if($can_travel)
                        <?php $price_travel = isset($advert) ? $advert->price_travel : null ?>
                        <?php $price_travel_percentage = isset($advert) ? $advert->price_travel_percentage : null ?>

                        <div class="ck-button col-md-12 col-md-offset-3">

                            {!! Form::input('checkbox','price_travel_supp', $price_travel,['class' => 'no-display', 'id' => 'price_travel_supp',
                             'checked' => $can_travel]) !!}
                            <label for='price_travel_supp' class="bottommargin-sm">
                                <span>Je souhaite facturer un supplément lorsque je me déplace</span>
                            </label>
                        </div>

                        <div class="col-md-12 {{$can_travel ? "" : "no-visibility" }}" id="price_travel_supp_display">

                            <div class="small col-md-offset-1 col-md-2"><em>Ce montant sera rajouté à votre prix de base</em></div>
                            {!! Form::input('text', 'price_travel_percentage', $price_travel_percentage,['class' => 'sm-form-control small-input col-md-1 leftmargin-sm', 'id' => 'price_travel_percentage']) !!}
                            <div class="col-md-1 small">&nbsp; Dirhams</div>
                            <div class="col-md-6" id="price_travel_text">Le tarif lorsque vous vous déplacez sera de <span id="price_travel_span"></span> Dhs par heure</div>
                            {!! Form::hidden('price_travel', null, ['id' => 'price_travel']) !!}
                        </div>

                        <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>
                    @endif

                    @if($can_webcam)

                        <div class="ck-button col-md-12 col-md-offset-3">
                            {!! Form::input('checkbox','price_webcam_bool',null,['class' => 'no-display', 'id' => 'price_webcam_bool',
                            'checked' => $can_webcam]) !!}
                            <label for='price_webcam_bool' class="bottommargin-sm ">
                                <span>Je souhaite réduire le prix pour les cours faits via webcam</span>
                            </label>
                        </div>

                        <?php $price_webcam = isset($advert) ? $advert->price_webcam : null ?>
                        <div class="col-md-12 {{$can_webcam? "" : 'no-visibility'}}" id="price_webcam_bool_display">
                            <div class="small col-md-offset-1 col-md-2"><em>Ce pourcentage sera déduit de votre prix de base</em></div>
                            {!! Form::input('text', 'price_webcam_percentage', $price_webcam,['class' => 'sm-form-control small-input col-md-1 leftmargin-sm', 'id' => 'price_webcam_percentage']) !!}
                            <div class="col-md-1 small">&nbsp; %</div>
                            <div class="col-md-6" id="price_webcam_text">Le tarif lorsque vous enseignez via webcam sera de <span id="price_webcam_span"></span> Dhs par heure</div>
                            {!! Form::hidden('price_webcam', null, ['id' => 'price_webcam' ]) !!}

                        </div>

                        <div class="divider divider-short divider-center"><i class="icon-crop"></i></div>
                    @endif

                    <div class="ck-button col-md-12 col-md-offset-3">
                        <?php $price_degressive_bool = isset($advert)? $advert->price_5_hours or $advert->price_10_hours : null;
                        $price_degressive = $price_degressive_bool ? "on" : null;
                        ?>
                        {!! Form::input('checkbox','price_degressive',null,['class' => 'no-display', 'id' => 'price_degressive',
                            'checked' => $price_degressive]) !!}
                        <label for='price_degressive' class="bottommargin-sm">
                            <span>Je pratique une réduction sur les forfaits payés à l'avance </span>
                        </label>
                    </div>

                    <div class="col-md-12 {{ $price_degressive_bool ? '' : 'no-visibility'}}" id="price_degressive_display">

                        <div class="small col-md-offset-1 col-md-2"><em>Ce pourcentage sera déduit de votre prix de base</em></div>

                        <?php $percentage_5_hours = isset($advert)? $advert->price_5_hours_percentage: null; ?>
                        {!! Form::label('price_5_hours_percentage',"Pour 5 heures", ['class' => 'col-md-2']) !!}
                        {!! Form::input('text', 'price_5_hours_percentage', $percentage_5_hours,['class' => 'sm-form-control small-input col-md-1', 'id' => 'price_5_hours_percentage']) !!}
                        <div class="col-md-1 small">&nbsp; %</div>
                        <div class="col-md-5" id="price_5_hours_text">Soit <span id="price_5_hours_span"></span>
                            Dhs par heure, et <span id="price_5_hours_total"></span> Dhs au total</div>

                        <div class="clearfix"></div>

                        <?php $percentage_10_hours = isset($advert)? $advert->price_10_hours_percentage: null; ?>
                        {!! Form::label('price_10_hours_percentage',"Pour 10 heures", ['class' => 'col-md-offset-3 col-md-2']) !!}
                        {!! Form::input('text', 'price_10_hours_percentage', $percentage_10_hours,['class' => 'sm-form-control small-input col-md-2 bottommargin-sm', 'id' => 'price_10_hours_percentage']) !!}
                        <div class="col-md-1 small">&nbsp; %</div>
                        <div class="col-md-5" id="price_10_hours_text">Soit <span id="price_10_hours_span"></span>
                            Dhs par heure, et <span id="price_10_hours_total"></span> Dhs au total</div>
                        {!! Form::hidden('price_5_hours', null, ['id' => 'price_5_hours' ]) !!}
                        {!! Form::hidden('price_10_hours', null, ['id' => 'price_10_hours' ]) !!}

                    </div>

                    <div class="divider divider-short divider-center topmargin-sm"><i class="icon-crop"></i></div>

                    <div class="col-md-offset-3 col-md-6">
                        <?php $price_more = isset($advert) ? $advert->price_more : null ?>

                        {!! Form::label('price_more',"Si vos tarifs varient en fonction d'autres paramètres, veuillez l'indiquer ci-dessous (facultatif)") !!}

                        {!! Form::textarea('price_more', $price_more,['class' => 'sm-form-control', 'id' => 'price_more']) !!}
                    </div>

                    <div class="col-md-6 col-md-offset-3 text-center topmargin-sm">
                        <button type="submit" class="button button-3d button-large button-rounded button-green">
                            J'ai défini le prix de mes cours
                        </button>
                    </div>
                    {!! Form::close() !!}

                    <script>
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

                                $(el + "_span").text(func(price, percent));
                                $(el + "_total").text(func(price, percent) * times);
                                $(el).val(func(price, percent) * times);
                            };

                            var getBasicPrice = function(){return checkInt($("#price").val())};

                            var minus_percentage = function (value, percentage){
                                return value - ((value * percentage)/100);
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
                        });

                    </script>