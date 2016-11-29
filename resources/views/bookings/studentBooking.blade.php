@if($booking->isStudent())

    <div class="col-md-2">
        {!! HTML::image(getAvatar($booking->prof->id),
                       null, ["style" => "width:190px;", 'id' => 'img-question-mark']) !!}
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
            'teacher' => 'à son domicile',
            'my_place' => 'chez vous',
            'any' => 'chez vous ou à son domicile',
            'location_webcam' => 'par webcam'
    ];

    ?>

    <div class="col-md-9 topmargin-sm">
        <em> Vous avez contacté <strong>{{ $booking->prof->firstname }}</strong> pour un
            cours <strong>{{$location[$booking->location] or $booking->pick_a_location}}</strong></em>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-10">
        <div class="col-md-8 topmargin-sm">

            {{ str_limit($booking->presentation, 65) }}

            <div class="clearfix"></div>

            @if($booking->wasAccepted())
                <div class="clearfix"></div>
                <div class="col-md-12">Contactez votre professeur :</div>
                <div class="col-md-12">E-mail: {{$booking->prof->email}}</div>
                <div class="col-md-12">Telephone: {{$booking->prof->telephone or  "N/A"}}</div>
            @endif
            <div class="pull-right">
                <i class="icon-location"></i>
                <strong>{{$booking->locality}}</strong>
            </div>

            <div class="col-md-12">
                Envoyée le {{$booking->created_at->format('d/m/Y à H:i') }}
            </div>
        </div>

        <div class="col-md-4">
            @if($booking->wasAccepted())
                <div class="green">Votre demande a été acceptée</div>

            @elseif($booking->wasRejected())
                <div class="">Votre demande a été refusée</div>

            @else
                <div class="">Demande en attente de réponse</div>
            @endif

        </div>
    </div>

@endif