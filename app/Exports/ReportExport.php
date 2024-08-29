<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    public string $currentView;
    public array $currentData = [];

    public function view(): View
    {
        return view($this->currentView, $this->currentData);
    }

    public function setCurrentView($currentView)
    {
        $this->currentView = $currentView;
        return $this;
    }

    public function setCurrentData($currentData)
    {
        $this->currentData = $currentData;
        return $this;
    }
}