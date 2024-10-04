<?php

namespace App\Livewire\Reports\News;

use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireReports\ReportComponent;
use App\Models\User;

class Take extends ReportComponent
{
    public function configure(): void
    {
        $this->setFileName('test-report');
        $this->setFileTitle('Take Report');

    }

    public function builder(): Builder
    {
        $user = User::query();

        $user->when($this->getFilter('name'), function ($query, $value) {
            $query->where('name', 'like', '%'.$value.'%');
        });

        $user->when($this->getFilter('email'), function ($query, $value) {
            $query->where('email', 'like', '%'.$value.'%');
        });

        return $user;
    }
}
