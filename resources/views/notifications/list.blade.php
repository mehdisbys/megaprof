<div id="csrf" data-content="{{csrf_token()}}"></div>

@foreach($notifications as $notification)
    <div class="gray-background" id="notification_{{$notification->id}}">

        <div class="content">
            <div class="col-md-10 border1px topmargin-sm content-message" id="{{$notification->id}}">
                <button type="button" class="close">&times;</button>
                <div class="col-md-10 topmargin-sm bottommargin-sm">
                    {{$notification->message}}
                </div>

                <div class="col-md-2 pull-right topmargin-sm">
                    <a class="btn btn-warning btn-md ">
                        Lire
                    </a>
                </div>
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