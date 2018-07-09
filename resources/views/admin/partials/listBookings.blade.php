@foreach($bookings as $booking)

    @if($booking->advert == NULL or !isset($booking->advert->slug) )
        <p>Debug : Could not display booking id : {{$booking->id}} </p>
        @continue
    @endif

    <div class="row border1px bottommargin-sm">

        <div class="col-md-4">

            <a href="/{{$booking->advert->slug}}">{{$booking->advert->title}}</a>
        </div>

        <div class="col-md-3">
            {{$booking->student->firstname}} (élève): {{$booking->presentation}}
        </div>

        <div class="col-md-3">
            @if($booking->answer != NULL)
                Réponse du professeur : {{$booking->answer}}
            @else
                Pas de réponse du professeur
            @endif
        </div>

        @if (\App\Models\Comment::where("advert_id", $booking->advert_id)->exists())
            <div class="col-md-3">
                <h4>Commentaires</h4>

                <li>
                    @foreach(\App\Models\Comment::where("advert_id", $booking->advert_id)->get() as $comment)
                        <ul> {{$comment->comment}}</ul>
                    @endforeach
                </li>
            </div>
        @endif


        <div class="col-md-3">
            Réservation faite le : {{$booking->created_at}}
        </div>

    </div>
@endforeach