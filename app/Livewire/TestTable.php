<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rishadblack\WireSpreadsheet\SpreadsheetComponent;

class TestTable extends SpreadsheetComponent
{
    public function configure(): void
    {
        // $this->setFileName('test-report');
    }

    public function builder(): Builder
    {
        return User::query();
    }

    public function columns(): array
    {
        return [
            ['title' => 'ID', 'width' => '50', 'readOnly' => true, 'primaryKey' => true],
            ['title' => 'ক্রমিক নং'],
            ['title' => 'আইডি'],
            [
                'type' => 'autocomplete',
                'title' => 'নাম',
                'source' => [
                    ['id' => 1, 'name' => 'Test'],
                ], // Method to call for autocomplete
            ],
            ['title' => 'কোড'],
            [
                'type' => 'autocomplete',
                'title' => 'নাম',
                'source' => [
                    ['id' => 1, 'name' => 'Test'],
                ], // Method to call for autocomplete
            ],
            ['title' => 'কোড'],
            ['title' => 'কাজের বিবরণ'],
            ['title' => 'শুরু'],
            ['title' => 'শেষ'],
            ['title' => 'পরিমান'],
            [
                'type' => 'autocomplete',
                'title' => 'একক',
                'source' => ['KM', 'MM', 'PCS'], // Method to call for autocomplete
            ],
            ['title' => 'পরিমান'],
            [
                'type' => 'autocomplete',
                'title' => 'একক',
                'source' => ['KM', 'MM', 'PCS'], // Method to call for autocomplete
            ],
            [
                'type' => 'autocomplete',
                'title' => 'অগ্রাধিকার',
                'source' => ['High', 'Medium', 'Low'], // Method to call for autocomplete
            ],
            ['title' => 'চাহিদার পরিমাণ (লক্ষ টাকা)'],
            ['title' => 'মন্তব্য'],
            ['title' => 'প্রক্রিয়া'],
        ];
    }
}
