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
        Commands\CreateDatabase::class,
        Commands\ClearStorage::class,
        Commands\DropDatabase::class,
        Commands\DropTables::class,
        Commands\Migrate::class,
   ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('telescope:prune')->daily();

        // $schedule->command('enso:calendar:send-reminders')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
