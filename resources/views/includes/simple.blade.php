@if (!$jobs->isEmpty())
<div class="scroller">   

                @foreach ($jobs as $job)

                    <div class="row col-md-7 job-ad hvr-glow">
                    <div class="row">
                        <h3 class="job-title col-md-6">
                            <a class="job-title-link" href="{{ $job->getUrl() }}">{{ $job->title }}</a>
                        </h3>
                    
                        <h5 class="published_at col-md-4">

                        {{ $job->published_date->formatLocalized('%A %d %B %Y') }}
                        </h5>
                    </div>
                    <div class="job-desc-snippet col-md-6">
                        {{ HtmlTruncator\Truncator::truncate($job->description, 30) }}
                    </div>

                    <div class="job-attributes">
                            <div class="col-md-4"><span class="job-location">Location</span> : {{ $job->location}}</div>
                            <div class="col-md-4"><span class="job-type">Job Type</span> : {{ $job->type}}</div>
                    </div>
                   <div style="clear:both;"></div> 
                    <div class="job-link col-md-2">
                        <a href="{{ $job->getUrl() }}">{{ trans('copy.misc.read_more') }}</a>
                    </div>
                    </div>


                @endforeach

                   <div style="clear:both;"></div> 
                {{ $jobs->render() }}
</div>
@else

	<p class="no-matching-jobs">{{ trans('copy.misc.no_matching_jobs') }}</p>

@endif
