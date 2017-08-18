<?php

namespace App\Search;

use App\Mail\WeeklyReportToAdmins;
use App\Models\SearchResults;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Gbrock\Table\Table;
use Illuminate\Support\Facades\Mail;

class SearchStatistics extends Command
{
    protected $signature = 'search_statistics';

    protected $description = 'Send a report on search stats to admins';

    const FREQUENCY = 1; // Week

    public function handle()
    {
        $result = SearchResults::groupBy(['subjectName', 'location'])
                               ->selectRaw('subjectName as matiere, location as localite, count(count) as recherches, count as Profs')
                               ->where('created_at', '>', Carbon::now()->subWeek())
                               ->orderBy('recherches', 'desc')
                               ->get();


        Mail::to(['mehdi.souihed@gmail.com', 'chayeb.yacine@gmail.com'])->send(new WeeklyReportToAdmins(new Table($result)));
    }

}