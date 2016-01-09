
<div id="coverLetters">
	@if(isset($lists))
		@foreach($lists as $list)
			<div id="letters-{{$list->count()? $list->first()->status : ''}}">

				@foreach($list as $letter)

					<div class="modal" tabindex="-1" role="dialog" id="coverLetter{{$letter->id}}" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title">Applicant Cover Letter</h3>
								</div>
								<div class="modal-body">

									{{ $letter->cv_cover_letter }}

								</div> <div class="modal-footer">

									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endforeach
	@endif
</div>
