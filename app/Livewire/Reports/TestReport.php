<?php

namespace App\Livewire\Reports;

use App\Models\User;
use App\Http\Common\ReportComponent;
use Illuminate\Database\Eloquent\Builder;

class TestReport extends ReportComponent
{
    public $view = 'livewire.reports.test-report';

    public function builder(): Builder
    {
        return User::query();
    }
}