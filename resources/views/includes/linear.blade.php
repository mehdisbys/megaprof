


@if ($count > 0)

<div id="jobs-and-side" class="">

	@include ('includes.jobs-and-side-panel')

</div>
@else

<p class="no-matching-jobs">{{ trans('copy.misc.no_matching_jobs') }}</p>

@endif
