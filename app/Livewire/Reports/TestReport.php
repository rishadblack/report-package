<?php

namespace App\Livewire\Reports;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireReports\ReportComponent;

class TestReport extends ReportComponent
{
    public function builder(): Builder
    {
        return User::query();
    }

    // public function setReportView()
    // {
    //     return 'livewire/reports/test-report';
    // }
}