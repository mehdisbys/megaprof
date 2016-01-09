<div class="">


    <div class="col-xs-12 col-md-3  margin-top-lg">

        <a href="/about"><h3 class=""><span class="glyphicon glyphicon-info-sign" ></span> Jobsite Features</h3></a>

    </div>

    <div class="col-md-8">
        @include ('home.filter')

        @if(isset($company))
            <h3>Offres d'emploi : <span>{{$company->name}}</span></h3>

        @else
            <h2>Latest Job Offers</h2>
        @endif
    </div>

    <div class="side-panel-linear col-md-3 col-xs-12" id="side-panel">

        @include ('includes.side-panel')

    </div>

    <div class="col-md-9 col-xs-12 col-sm-12" id="jobs-listing">
        <div id="selectedFilters-industry"></div>
        <div id="selectedFilters-education"></div>
        <div id="selectedFilters-experience"></div>
        @if ($count == 0)
            <p class="no-matching-jobs">{{ trans('copy.misc.no_matching_jobs') }}</p>

        @else
            <p class="matching-jobs">{{$count}} adverts corresponding to your criterias found</p>

        @endif
        @include ('includes.displayJobs', ['jobs'=> $premium ])
        @include ('includes.displayJobs')

    </div>
</div>


