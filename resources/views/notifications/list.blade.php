<div id="csrf" data-content="{{csrf_token()}}"></div>

@foreach($notifications as $notification)
    <div class="gray-background" id="notification_{{$notification->id}}">

        <div class="col-md-10 border1px topmargin-sm content-message notification-message" id="{{$notification->id}}">

            <?php $advert = \App\Models\Advert::find($notification->advert_id)?>

            @if($notification->name === 'social-networks' and $advert)
                <button type="button" class="close">&times;</button>
                <div class="col-md-10 topmargin-sm bottommargin-sm">
                    {{$notification->message}}
                    <p class="pull-right"><a
                                href="http://www.facebook.com/sharer.php?u={{env('APP_URL')}}{{$advert->slug}}"
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
                <h5>@lang('notifications/list.advertRejected', ["advert" => $advert->title]) </h5>
                <div><u>@lang('notifications/list.reason')</u></div>
                <div class="col-md-10 bottommargin-sm">
                    {!! nl2br(e($notification->message))!!}
                </div>
                <small class="col-md-10"><i class="fa fa-info-circle"> </i> @lang('notifications/list.fixYourAdvert')
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