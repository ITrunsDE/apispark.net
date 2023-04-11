<?php

namespace App\Console;

use App\Services\QueueEndpointJobForUser;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        // run queue worker
        $schedule->command(command: 'queue:work --stop-when-empty')
            ->everyMinute()
            ->withoutOverlapping();

        // run EndpointJobs
        $schedule->call(callback: QueueEndpointJobForUser::class)->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
