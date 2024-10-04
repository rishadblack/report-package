<?php

namespace App\Livewire\Reports;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireReports\ReportComponent;

class TestReport extends ReportComponent
{
    public function configure(): void
    {
        $this->setFileName('test-report');
    }

    public function builder(): Builder
    {
        return User::query();
    }
}
