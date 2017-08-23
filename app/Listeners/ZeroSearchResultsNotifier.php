<?php


namespace App\Listeners;


use App\Events\UserDidASearch;
use App\Models\SearchResults;

class ZeroSearchResultsNotifier
{

    public function handle(UserDidASearch $event)
    {
        if (SearchResults::shouldRecord()) {
            SearchResults::create([
                                      'count'       => $event->count,
                                      'subjectId'   => $event->subjectId,
                                      'subjectName' => $event->subjectName,
                                      'location'    => $event->location,
                                      'ip'          => \Illuminate\Support\Facades\Request::ip()
                                  ]);
        }
    }
}