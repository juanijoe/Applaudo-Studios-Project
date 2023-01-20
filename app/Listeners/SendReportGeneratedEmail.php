<?php

namespace App\Listeners;

use App\Mail\ReportStatusChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendReportGeneratedEmail
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $report = $event->report;

        Mail::to($report->position->company->email)->send(new ReportStatusChange($report));
    }
}
