@if(isset($booking) and $booking->isStudent())

    <div class="row col-md-12">

        <div class="col-md-2">
            {!! HTML::image(getAvatar($booking->prof->id),null, ["style" => "width:190px;", 'id' => 'img-question-mark']) !!}
        </div>

        <div class="col-md-4">
            @if(isset($booking->advert->subjectsPerAd))
                @foreach($booking->advert->subjectsPerAd ?? [] as $subject)
                    <div class="btn btn-info btn-md ">
                        {{\App\Models\SubSubject::find($subject->subject_id)->name}}
                    </div>
                @endforeach
            @endif
            <div class=""><strong>{{$booking->advert->price}}Dh/h</strong></div>
        </div>

        <?php
        $location = [
                'teacher'         => 'à son domicile',
                'my_place'        => 'chez vous',
                'any'             => 'chez vous ou à son domicile',
                'location_webcam' => 'par webcam'
        ];
        ?>

        <div class="col-md-6">
            @if($booking->wasAccepted())

                <div class="label label-success">Votre demande a été acceptée <span><i class="fa fa-check"
                                                                         aria-hidden="true"></i></span>
                </div>
            @elseif($booking->wasRejected())
                <div class="label label-warning">Votre demande a été refusée</div>

            @else
                <div class="label label-info">Demande en attente de réponse</div>
            @endif

        </div>

        <div class="col-md-9 topmargin-sm">
            <em> Vous avez contacté <strong>{{ $booking->prof->firstname }}</strong> pour un
                cours <strong>{{$location[$booking->location] or $booking->pick_a_location}}</strong></em>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12 row ">
            <div class="col-md-12 topmargin-small">

                <strong>Votre message</strong> : <p>{{ str_limit($booking->presentation, 100) }}</p>

            </div>
        </div>

        <div class="col-md-12 row">
            @if($booking->wasAccepted())
                <div class="col-md-12"><strong>Contactez votre professeur</strong>:</div>
                <div class="col-md-12"><strong>E-mail</strong>: {{$booking->prof->email}}</div>
                <div class="col-md-12"><strong>Telephone</strong>: {{$booking->prof->telephone or  "N/A"}}</div>
            @endif
        </div>

        <div class="col-md-12 topmargin-small row">
            <div class="col-md-6">Envoyée le {{$booking->created_at->format('d/m/Y à H:i') }}</div>
            <div class="col-md-6 pull-right"><i class="icon-location"></i><strong>Casablanca</strong></div>
        </div>


    </div>
@endif