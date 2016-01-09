<div class="fade in">

    @foreach ($jobs as $job)

        <div class="">

            <div class="col-md-12 job-ad-linear hvr-glow {{$job->premium ? 'premium' : ''}} ">

                @if(Auth::check() and alreadyApplied($job->id,Auth::id()))

                    <span class="glyphicon glyphicon-ok pull-right green" title="You have applied to this advert"></span>

                @endif

                <a class="a-no-decoration" href="{{ $job->getUrl() }}">

                    <div class="col-md-6 ">
                        <div class="col-md-12">
                            <span class="job-title-link lead job-title">{{ $job->title }}</span>

                            @if($job->premium)
                                <span class="label label-danger small">Premium</span>
                            @endif

                        </div>
                        <div class="col-md-12">{{ str_limit($job->description, 135) }}</div>
                    </div>
                </a>
                <div class="col-md-3">

                    <div class="col-md-12 job-location">
                        <img style="margin-left:-25px"
                             class="wpjb-inline-img"
                             alt=""
                             src="/location-red.png">
                        {{ $job->location_display? $job->location_display : $job->location}}
                    </div>

                    <div class="col-md-12">{{ $job->type}}</div>
                    <div class="published_at-linear col-md-12 pull-right">{{ $job->published_date->formatLocalized('%d %B %Y') }}</div>
                </div>
                <div class="col-md-3">
                    <div class=""><img alt="company logo" src="{{$job->company->logoUrl()}}" width='120'></div>
                    <div class="col-md-12 pull-left"><a href="{{$job->company->website}}">{{$job->company->name}}</a></div>
                </div>
            </div>
        </div>
    @endforeach
    <div style="clear:both;"></div>
    {{ $jobs->render() }}
</div>