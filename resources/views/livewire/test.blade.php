<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state(['name' => 'Salma']);

// rules(['password' => ['required', 'string']]);

$changeName = function () {
    $this->name = 'Salma Akther';
};
?>

<div>
    Test Page {{ $name }}
    <button type="button" wire:click="changeName">Change</button>
</div>
