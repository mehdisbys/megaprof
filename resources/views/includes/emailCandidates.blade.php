{{HTML::script('js/tinymce/tinymce.min.js',['async' => 'async'])}}
{{HTML::script('js/tinyMceSetup.js',['async' => 'async'])}}

<div class="modal fade" id="emailChecked" role="dialog" aria-labelledby="confirm" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Email Selected Candidates</h4>
            </div>
            <div id="emailListOfSelectedCandidates"></div>
            {{BootForm::open()->action("/jobs/{$slug}/candidates/email")->class('groupActionEmail')}}
            <div class="modal-body">
                <textarea id="emailBody" class="form-control" type="text" name="emailBody">
                    {{e(\App\Models\EmailTemplate::all()->first()->template)}}
                </textarea>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="submit" id="sendEmailChecked" class="btn btn-success">Send</button>
            </div>
            {{BootForm::close()}}

        </div>
    </div>
</div>

