<?php

namespace App\Livewire\Search;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireTomselect\SearchComponent;

class TestSearch extends SearchComponent
{
    public function configure(): void
    {
        $this->isSearchable();
    }

    public function builder(): Builder
    {
        return User::query()->limit(10);
    }
}
