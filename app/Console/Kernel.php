<?php

namespace App\Console;

use App\Search\SearchStatistics;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Reminders\Commands\RemindUsers;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
        \App\Console\Commands\GenerateSitemap::class,
        RemindUsers::class,
        SearchStatistics::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      //  $schedule->command('inspire')->hourly();
        $schedule->command('sitemap:generate')->dailyAt('04:00');
      //  $schedule->command('remind_users:check')->dailyAt('05:00');
      //  $schedule->command('search_statistics')->weekly()->mondays()->at('07:00');
    }
}
