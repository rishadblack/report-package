<?php
namespace App\Livewire\Search;

use App\Models\District;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Reactive;
use Rishadblack\WireTomselect\SearchComponent;

class Districts extends SearchComponent
{
    #[Reactive]
    public $division_id;

    public function configure(): void
    {
        $this->isSearchable();
    }

    public function builder(): Builder
    {
        $query = District::query();

        if ($this->division_id) {
            $query->where('division_id', $this->division_id);
        } else {
            $query->where('division_id', 0);
        }

        return $query;
    }
}