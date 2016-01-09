@if (Session::has('thanks_message'))
<div class="alert alert-success form-group col-md-12">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>	
	{{ Session::get('thanks_message') }}
</div>
@endif
