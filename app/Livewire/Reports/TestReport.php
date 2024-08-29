<?php

namespace App\Livewire\Reports;

use App\Models\User;
use App\Http\Common\ReportComponent;
use Illuminate\Database\Eloquent\Builder;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

class TestReport extends ReportComponent
{
    public $view = 'livewire.reports.test-report';

    public function builder(): Builder
    {
        return User::query();
    }
}
