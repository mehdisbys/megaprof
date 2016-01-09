@if(isset ($job->stats))
    <div class="col-md-8">
        <a href="{{ '/jobs/'. $job->slug .'/applications'}}">
            {{ $job->stats->nb_applications }} applications </a></div>
    <div class="col-md-4">{{ $job->stats->nb_views }}
        <span title="Number of times the advert has been seen" class="blue glyphicon glyphicon-eye-open"></span></div>
@else
    <div class="col-md-8">0 applications</div>
    <div class="col-md-4">0
        <span title="Number of times the advert has been seen" class="blue glyphicon glyphicon-eye-open"></span></div>
@endif