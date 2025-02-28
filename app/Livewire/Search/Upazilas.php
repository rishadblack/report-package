<?php
namespace App\Livewire\Search;

use App\Models\Upazila;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Reactive;
use Rishadblack\WireTomselect\SearchComponent;

class Upazilas extends SearchComponent
{
    #[Reactive]
    public $district_id;

    public function configure(): void
    {
        $this->isSearchable();
    }

    public function builder(): Builder
    {
        $query = Upazila::query();

        if ($this->district_id) {
            if (is_array($this->district_id)) {
                $query->whereIn('district_id', $this->district_id);
            } else {
                $query->where('district_id', $this->district_id);
            }
        } else {
            $query->where('district_id', 0);
        }

        return $query;
    }
}