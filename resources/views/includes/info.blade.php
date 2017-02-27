
@if (Session::has('info_message'))

<div class="alert alert-info toastr-info form-group">
	{!!   Session::get('info_message') !!}
</div>
@endif
