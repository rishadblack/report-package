<?php
namespace App\Livewire\Search;

use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireTomselect\SearchComponent;

class Countries extends SearchComponent
{
    public function configure(): void
    {
        $this->isSearchable();
        $this->showRemoveButton();
    }

    public function builder(): Builder
    {
        return Country::query();
    }
}