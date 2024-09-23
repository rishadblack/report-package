<?php

namespace App\Livewire\Demo;

use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireReports\ReportComponent;
use App\Models\User;

class TestThree extends ReportComponent
{
    public $view = 'livewire.demo.test-three';

    public function builder(): Builder
    {
        return User::query();
    }
}
