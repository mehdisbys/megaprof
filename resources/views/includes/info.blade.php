
@if (Session::has('info_message'))

<div class="alert toastr-info form-group no-visibility">
	{{ Session::get('info_message') }}
</div>
@endif
