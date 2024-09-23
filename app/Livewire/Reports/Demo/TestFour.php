<?php

namespace App\Livewire\Reports\Demo;

use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireReports\ReportComponent;
use App\Models\User;

class TestFour extends ReportComponent
{
    public $view = 'livewire.reports.demo.test-four';

    public function builder(): Builder
    {
        return User::query();
    }
}
