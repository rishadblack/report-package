<?php

namespace App\Livewire\Reports\Salma;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireReports\Views\Column;
use Rishadblack\WireReports\Views\Filter;
use Rishadblack\WireReports\ReportComponent;

class Test extends ReportComponent
{
    public function configure(): void
    {
        $this->setFileName('test-report');
        $this->setFileTitle('Take Report');
        $this->setPagination(25);
    }

    public function filters(): array
    {
        return [
            Filter::make('Active', 'status', 'select')
                ->options([
                    1 => 'All',
                    2 => 'Yes',
                    3 => 'No',
                ])
                ->filter(function (Builder $builder, int $value) {
                    if ($value == 2) {
                        $builder->whereId(2);
                    } elseif ($value == 3) {
                        $builder->whereId(3);
                    }
                })
                ->placeholder('Select Active Status'),
            Filter::make('Name', 'name', 'text')
                ->options([
                    1 => 'All',
                    2 => 'Yes',
                    3 => 'No',
                ])
                ->responseTime(1000)
                ->filter(function (Builder $builder, string $value) {
                    if (!empty($value)) {
                        $builder->where('name', 'like', '%'.$value.'%');
                    }
                })
                ->placeholder('Search by name'),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->searchable()->sortable(),
            Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable(),
        ];
    }

    public function builder(): Builder
    {
        return User::query();
    }
}
