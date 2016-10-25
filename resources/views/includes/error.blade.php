
@if (Session::has('error_message'))

<div class="alert toastr-error form-group hidden">
	{{ Session::get('error_message') }}
</div>
@endif
