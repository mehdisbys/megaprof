<div id="csrf" data-content="{{csrf_token()}}"></div>

@foreach($notifications as $notification)
    <div class="gray-background" id="notification_{{$notification->id}}">

        <div class="content">
            <div class="col-md-10 border1px topmargin-sm content-message" id="{{$notification->id}}">
                <button type="button" class="close">&times;</button>
                <div class="col-md-10 topmargin-sm bottommargin-sm">
                    {{$notification->message}}
                </div>

                @if($notification->name === 'social-networks')
                    <div class="col-md-2 pull-right topmargin-sm">
                        <a href="http://www.facebook.com/sharer.php?u=http://localhost:8000/{{\App\Models\Advert::find($notification->advert_id)->slug}}"
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
                    </div>
                @else
                    <div class="col-md-2 pull-right topmargin-sm">
                        <a class="btn btn-warning btn-md" href="{{$notification->link}}">
                            Lire
                        </a>
                    </div>
                @endif


            </div>
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