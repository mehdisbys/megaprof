<div id="csrf" data-content="{{csrf_token()}}"></div>

@foreach($notifications as $notification)
    <div class="gray-background" id="notification_{{$notification->id}}">

        <div class="col-md-10 border1px topmargin-sm content-message notification-message" id="{{$notification->id}}">

            <?php $advert = \App\Models\Advert::find($notification->advert_id)?>

            @if($notification->name === 'social-networks' and $advert)
                <button type="button" class="close">&times;</button>
                <div class="col-md-10 topmargin-sm bottommargin-sm">
                    {{$notification->message}}
                    <p class="pull-right"><a href="http://www.facebook.com/sharer.php?u={{env('APP_URL')}}{{$advert->slug}}"
                          data-send="false"
                          data-layout="box_count"
                          data-width="60"
                          data-show-faces="false"
                          rel="nofollow"
                          target="_blank"
                          class="social-icon si-colored si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                    </p>
                </div>

            @elseif($notification->name === 'advert_rejected' and $advert)
                <button type="button" class="close">&times;</button>
                <h5>Votre annonce a été modérée : {{$advert->title}}</h5>
                <div><u>Raison:</u></div>
                <div class="col-md-10 bottommargin-sm">
                    {!! nl2br(e($notification->message))!!}
                </div>
                <small class="col-md-10"><i class="fa fa-info-circle"> </i> Allez dans mes annonces et effectuez les
                    modifications nécessaires afin que votre annonce soit publiée au plus vite.
                </small>
            @else
                <button type="button" class="close">&times;</button>
                <div class="col-md-10 topmargin-sm bottommargin-sm">
                    {!!  $notification->message !!}
                </div>
            @endif

        </div>
    </div>
@endforeach
<script>
    $(document).ready(function () {

                $('.close').on('click', function () {

                    $.post("hide-notification/" + $(this).parent().attr('id'),
                            {_token: $('#csrf').attr('data-content')}
                    );
                    $(this).parent().fadeOut(900);

                })
            }
    );
</script>