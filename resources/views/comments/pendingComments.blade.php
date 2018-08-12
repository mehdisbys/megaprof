@foreach($pendingComments as $comment)
    <div class="gray-background" id="notification_{{$comment->id}}">

        <div class="content">
            <div class="col-md-12 border1px topmargin-sm content-message" id="{{$comment->id}}">
                <div class="col-md-8 topmargin-sm bottommargin-sm">
                    @lang('comments/pendingComments.leaveComment)
                    @if($comment->iWasTheProf())
                        @lang('comments/pendingComments.student')
                    @else
                        @lang('comments/pendingComments.teacher)
                    @endif
                    <strong>{{$comment->targetUser->firstname}}</strong>
                </div>

                <div class="col-md-4 pull-right topmargin-sm bottommargin-sm">
                    <a class="btn btn-warning btn-md" href="/laisser-un-commentaire/{{$comment->id}}">
                        @lang('comments/pendingComments.comment')
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10">
    </div>
@endforeach
