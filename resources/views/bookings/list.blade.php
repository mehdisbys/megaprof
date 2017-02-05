@if(isset($bookings))
    @foreach($bookings as $booking)
        <article class="gray-background" id="booking_{{$booking->id}}">
            <div class="col-md-10 well">

                @if($booking->isStudent())

                    @include('bookings.studentBooking')

                    @else

                    @include('bookings.profBooking')

                @endif

            </div>
        </article>
    @endforeach
@endif