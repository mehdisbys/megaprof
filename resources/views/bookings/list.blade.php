@if(isset($bookings))
    @foreach($bookings as $booking)
        <div class="gray-background" id="booking_{{$booking->id}}">
            <div class="col-md-10 col-xs-12 well">

                @if($booking->isStudent())

                    @include('bookings.studentBooking')

                    @else

                    @include('bookings.profBooking')

                @endif

            </div>
        </div>
    @endforeach
@endif