<?php

namespace App\Http\Common;

use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

abstract class ReportComponent extends Component
{
    public $datas;

    public function exportPdf()
    {
        $data = [
                    'datas' => $this->builder()->get(),
                    'view' => $this->view
                ];

        $pdf = LaravelMpdf::loadView('livewire.report-component.report-pdf', $data);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream('document.pdf');
        }, 'document.pdf');
    }

    public function render()
    {
        $this->datas = $this->builder()->get();
        return view('livewire.report-component.report-view');
    }
}
