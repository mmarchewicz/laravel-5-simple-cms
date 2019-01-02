<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Cms\Initialize::class,
        \App\Console\Commands\Cms\CleanCommand::class,
        \App\Console\Commands\Cms\ExportCommand::class,
        \App\Console\Commands\Cms\FindCommand::class,
        \App\Console\Commands\Cms\ImportCommand::class,
        \App\Console\Commands\Cms\ResetCommand::class,
        \App\Console\Commands\Cms\Resource::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
    }
}
