@foreach($bookings as $booking)
    <article class="gray-background" id="booking_{{$booking->id}}">
        <div class="col-md-12 topmargin-sm">
            <div class="col-md-2">
                {!! HTML::image('images/question-mark-face.jpg',
                null, ["style" => "width:190px;", 'id' => 'img-question-mark']) !!}

            </div>

            <div class="col-md-9 topmargin-sm">
                @if($booking->isStudent())
                    <em> Vous avez contacté <strong>{{ $booking->prof->firstname }}</strong> pour un
                        cours</em>
                @else
                    <em><strong>{{ $booking->student->firstname }}</strong> vous a contacté pour un
                        cours</em>
                @endif
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12">

                <div class="col-md-8 topmargin-sm">

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


                    @if(isset($summary))
                        {{ str_limit($booking->presentation, 65) }}
                    @else
                        {{ $booking->presentation }}
                    @endif

                    <div class="clearfix"></div>

                    @if($booking->isStudent() and $booking->wasAccepted())
                        <div class="clearfix"></div>
                        <div class="col-md-12">Contactez votre professeur :</div>
                        <div class="col-md-12">E-mail: {{$booking->prof->email}}</div>
                        <!-- TODO put real telephone contact -->
                        <div class="col-md-12">Telephone: 06 01 02 03 04</div>

                    @endif

                    <div class="pull-right">
                        <i class="icon-location"></i>
                        <strong>{{$booking->advert->location_city}}</strong>
                    </div>

                    <div class="col-md-12">

                        Reçue le {{$booking->created_at->format('d/m/Y à H:i') }}
                    </div>
                </div>

                <div class="col-md-4">

                    @if($booking->isProf())
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
                    @elseif($booking->isStudent())
                        @if($booking->wasAccepted())
                            <div class="green">Votre demande a été acceptée</div>

                        @elseif($booking->wasRejected())
                            <div class="">Votre demande a été refusée</div>

                        @else
                            <div class="">Demande en attente de réponse</div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </article>
@endforeach