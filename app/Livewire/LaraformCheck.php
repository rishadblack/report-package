<?php
namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.backend')]
class LaraformCheck extends Component
{
    public $name;
    public $date;

    public function setSelectData()
    {
        $this->name = 'Test';
    }

    public function resetSelectData()
    {
        $this->reset();
    }

    public function mount()
    {
        // $this->name = "Demo";
    }

    public function render()
    {
        return view('livewire.laraform-check');
    }
}
