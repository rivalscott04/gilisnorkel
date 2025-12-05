<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function ()
        {
            $current_date = now('Asia/Makassar')->toDateTimeString() ;
            //Check Booking Unpaid Booking
            $updated = Booking::query()
                ->whereRaw("TIMESTAMPDIFF(HOUR,created_at,'{$current_date}') > 8 AND status = 'unpaid'")
                ->update(["status" => 'cancel']);

            if($updated)
                Log::info("Booking Canceled");

        })->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
