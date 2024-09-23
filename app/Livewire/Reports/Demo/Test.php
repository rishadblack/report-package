<?php

namespace App\Livewire\Reports\Demo;

use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireReports\ReportComponent;
use App\Models\User;

class Test extends ReportComponent
{
    public $view = 'livewire/reports/demo/test';

    public function builder(): Builder
    {
        return User::query();
    }
}
