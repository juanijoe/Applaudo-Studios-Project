<?php

namespace App\Events;

use App\Models\Report;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ReportGenerated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $report;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

}
