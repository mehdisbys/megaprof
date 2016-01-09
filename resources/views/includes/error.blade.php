
@if (Session::has('error_message'))

<div class="alert alert-danger form-group col-md-12">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>	
	{{ Session::get('error_message') }}
</div>
@endif
