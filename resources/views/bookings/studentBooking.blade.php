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
            'teacher' => __('bookings.profBooking.yourPlace'),
            'my_place' => __('bookings.profBooking.theirPlace'),
            'any' => __('bookings.profBooking.any'),
            'location_webcam' => __('bookings.profBooking.webcam')
        ];
        ?>

        <div class="col-md-6">
            @if($booking->wasAccepted())

                <div class="label label-success">@lang('bookings.studentBooking.accepted') <span><i class="fa fa-check"
                                                                         aria-hidden="true"></i></span>
                </div>
            @elseif($booking->wasRejected())
                <div class="label label-warning">@lang('bookings.studentBooking.rejected')</div>

            @else
                <div class="label label-info">@lang('bookings.studentBooking.waitingAnswer')</div>
            @endif

        </div>

        <div class="col-md-9 topmargin-sm">
            <em> @lang('bookings.studentBooking.youContacted') <strong>{{ $booking->prof->firstname }}</strong> @lang('bookings.studentBooking.forALesson') <strong>{{$location[$booking->location] or $booking->pick_a_location}}</strong></em>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12 row ">
            <div class="col-md-12 topmargin-small">

                <strong>@lang('bookings.studentBooking.yourMessage')</strong> : <p>{{ str_limit($booking->presentation, 100) }}</p>

            </div>
        </div>

        <div class="col-md-12 row">
            @if($booking->wasAccepted())
                <div class="col-md-12"><strong>@lang('bookings.studentBooking.contactTeacher')</strong>:</div>
                <div class="col-md-12"><strong>@lang('bookings.studentBooking.email')</strong>: {{$booking->prof->email}}</div>
                <div class="col-md-12"><strong>@lang('bookings.studentBooking.phone')</strong>: {{$booking->prof->mobile or  __('bookings.studentBooking.noPhone')}}</div>
            @endif
        </div>

        <div class="col-md-12 topmargin-small row">
            <div class="col-md-6">@lang('bookings.studentBooking.sentAt') {{$booking->created_at->format('d/m/Y à H:i') }}</div>
            <div class="col-md-6 pull-right"><i class="icon-location"></i><strong>{{$booking->locality}}</strong></div>
        </div>


    </div>
@endif