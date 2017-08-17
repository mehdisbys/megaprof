<?php

namespace App\Search;

use App\Models\SearchResults;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Gbrock\Table\Table;

class SearchStatistics extends Command
{
    protected $signature = 'search_statistics';


    const FREQUENCY = 1; // Week

    public function handle()
    {
        $result = SearchResults::groupBy(['subjectName', 'location'])
                               ->selectRaw('*, count(count) as search_count')
                               ->where('created_at', '>', Carbon::now()->subWeek())
                               ->orderBy('search_count', 'desc')
                               ->get();


        return new Table($result);
    }

}