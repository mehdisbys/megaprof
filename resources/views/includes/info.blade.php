
@if (Session::has('info_message'))

<div class="alert alert-info form-group col-md-12">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>	
	{{ Session::get('info_message') }}
</div>
@endif
