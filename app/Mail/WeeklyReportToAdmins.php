<?php


namespace App\Mail;


use Carbon\Carbon;
use Gbrock\Table\Table;
use Illuminate\Mail\Mailable;

class WeeklyReportToAdmins extends Mailable
{

    public $searchStats;

    public function __construct(Table $searchStats)
    {
        $this->searchStats = $searchStats;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $week = Carbon::now()->weekOfYear;

        $this->subject('Statistiques de recherches pour semaine ' . $week);

        return $this->view('emails.admin.stats');
    }
}