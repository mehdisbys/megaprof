<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="{{$id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">{{$title}}</h4>
            </div>
            {{BootForm::open()->action($route)}}
            <div class="modal-body">
                <textarea id={{"$id-content"}} class="ckeditor form-control" type="text" name="{{$varname}}">
                {{e($message)}}
                </textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="actionModal" class="btn btn-success">{{$action}}</button>
            </div>
            {{BootForm::close()}}
        </div>
    </div>
</div>
