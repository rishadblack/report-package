<?php

namespace App\Livewire\Demo;

use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireReports\ReportComponent;
use App\Models\User;

class TestTwo extends ReportComponent
{
    public $view = 'livewire.demo.test-two';

    public function builder(): Builder
    {
        return User::query();
    }
}
