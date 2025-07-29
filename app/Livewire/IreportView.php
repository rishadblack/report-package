<?php
namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.backend')]
class IreportView extends Component
{
    public function render()
    {
        return view('livewire.ireport-view');
    }
}
