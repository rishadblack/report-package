<?php

namespace App\Livewire\Reports\News;

use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireReports\ReportComponent;
use App\Models\User;

class Take extends ReportComponent
{
    public $view = 'livewire.reports.news.take';

    public function builder(): Builder
    {
        return User::query();
    }
}
