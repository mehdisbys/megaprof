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
            <div class=""><strong>{{$booking->advert->price}}Dh/h</strong></div>
        @endif
    </div>


    <div class="col-md-9 topmargin-sm">

        <?php
        $location = [
            'teacher' => __('bookings.profBooking.yourPlace'),
            'my_place' => __('bookings.profBooking.theirPlace'),
            'any' => __('bookings.profBooking.any'),
            'location_webcam' => __('bookings.profBooking.webcam')
        ];
        ?>

        <em><strong>{{ $booking->student->firstname }}</strong> @lang("bookings.profBooking.livingAt")
            <strong>{{$booking->locality}}</strong> @lang("bookings.profBooking.contactedYouForLesson")
            <strong>{{$location[$booking->location] or $booking->pick_a_location}}</strong></em>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
        <div class="col-md-8 topmargin-sm">

            {{ $booking->presentation }}

            <div class="clearfix"></div>

            @if($booking->wasAccepted())
                <div class="clearfix"></div>
                <div class="col-md-12">@lang("bookings.profBooking.contactYourStudent") :</div>
                <div class="col-md-12">@lang("bookings.profBooking.email"): {{$booking->student->email}}</div>
                <div class="col-md-12">@lang("bookings.profBooking.phone")
                    : {{$booking->student->mobile or  __('bookings.profBooking.noPhone')}}</div>
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
                <div class="green">@lang('bookings.profBooking.youAccepted')</div>

            @elseif($booking->wasRejected())
                <div class="">@lang('bookings.profBooking.youRejected')</div>

            @else
                <div id="booking_{{$booking->id}}_accept"
                     class="button button-small button-white button-rounded"><a
                            href="/demande/{{$booking->id}}/yes">@lang('bookings.profBooking.accept')</a>
                </div>

                <div id="booking_{{$booking->id}}_refuse"
                     class="button button-small button-gray button-rounded"><a
                            href="/demande/{{$booking->id}}/no">@lang('bookings.profBooking.reject')</a>
                </div>
            @endif

        </div>
    </div>
@endif

