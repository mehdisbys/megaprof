@if (Session::has('thanks_message'))
<div class="alert toastr-success form-group no-visibility">
	{{ Session::get('thanks_message') }}
</div>
@endif
