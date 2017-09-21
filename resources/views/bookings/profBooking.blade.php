@if($booking->isProf())

    <div class="col-md-2">
        {!! HTML::image(getAvatar($booking->student->id),
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


    <div class="col-md-9 topmargin-sm">

        <?php
        $location = [
                'teacher' => 'chez vous',
                'my_place' => 'à son domicile',
                'any' => 'chez vous ou à son domicile',
                'location_webcam' => 'par webcam'
        ];
        ?>

    <em><strong>{{ $booking->student->firstname }}</strong> vivant à <strong>{{$booking->locality}}</strong> vous a contacté pour un
        cours <strong>{{$location[$booking->location] or $booking->pick_a_location}}</strong></em>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
        <div class="col-md-8 topmargin-sm">

            {{ $booking->presentation }}

            <div class="clearfix"></div>

            @if($booking->wasAccepted())
                <div class="clearfix"></div>
                <div class="col-md-12">Contactez votre élève :</div>
                <div class="col-md-12">E-mail: {{$booking->student->email}}</div>
                <div class="col-md-12">Telephone: {{$booking->student->mobile or  "N/A"}}</div>
            @endif
            <div class="pull-right">
                <i class="icon-location"></i>
                <strong>{{$booking->locality}}</strong>
            </div>

            <div class="col-md-12">
                Reçue le {{$booking->created_at->format('d/m/Y à H:i') }}
            </div>
        </div>

        <div class="col-md-4 topmargin-sm">
                @if($booking->wasAccepted())
                    <div class="green">Vous avez accepté cette demande</div>

                @elseif($booking->wasRejected())
                    <div class="">Vous avez refusé cette demande</div>

                @else
                    <div id="booking_{{$booking->id}}_accept"
                         class="button button-small button-white button-rounded"><a
                                href="/demande/{{$booking->id}}/yes">Accepter</a>
                    </div>

                    <div id="booking_{{$booking->id}}_refuse"
                         class="button button-small button-gray button-rounded"><a
                                href="/demande/{{$booking->id}}/no">Refuser</a>
                    </div>
                @endif

        </div>
    </div>
@endif

