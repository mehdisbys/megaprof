<div class="modal fade" id="{{$data['id']}}" tabindex="-1" role="dialog" aria-labelledby="{{$data['id']}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">{{$data['title']}}</h4>
            </div>
            <div class="modal-body">
                {{$data['message']}}
            </div>
            <div class="modal-footer">
                @if(isset($data['action']))
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="actionModal" class="btn btn-danger">{{$data['action']}}</button>
                @endif
            </div>
        </div>
    </div>
</div>
