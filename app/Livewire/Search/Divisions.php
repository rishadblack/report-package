<?php
namespace App\Livewire\Search;

use App\Models\Division;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Reactive;
use Rishadblack\WireTomselect\SearchComponent;

class Divisions extends SearchComponent
{
    #[Reactive]
    public $country_id;

    public function configure(): void
    {
        $this->isSearchable();
    }

    public function builder(): Builder
    {
        $query = Division::query();
        if ($this->country_id) {
            $query->where('country_id', $this->country_id);
        } else {
            $query->where('country_id', 0);
        }
        return $query;
    }
}