<?php
namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.backend')]
class TomSelectCheck extends Component
{
    public $country_id = 101;
    public $division_id;
    public $district_id;
    public $upazila_id;

    public function setSelectData()
    {
        $this->country_id = 19;
        $this->division_id = 3;
        $this->district_id = 1;
        $this->upazila_id = 497;
    }

    public function resetSelectData()
    {
        $this->reset();
    }

    public function mount()
    {
        // $this->country_id = 19;
    }

    public function render()
    {
        return view('livewire.tom-select-check');
    }
}