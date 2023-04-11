<?php

namespace App\Console;

use App\Services\QueueEndpointJobForUser;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        // run EndpointJobs
        $schedule->call(callback: new QueueEndpointJobForUser)->everyMinute();

        // run queue worker
        $schedule->command(command: 'queue:work --stop-when-empty')
            ->everyMinute()
            ->withoutOverlapping();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
