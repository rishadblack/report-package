<?php

namespace App\Http\Common;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\ReportExport;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Database\Eloquent\Builder;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

abstract class ReportComponent extends Component
{
    use WithPagination;

    public function baseBuilder():Builder
    {
        return $this->builder();
    }

    public function exportPdf()
    {
        $pdf = LaravelMpdf::loadView('livewire.report-component.report-pdf', $this->returnViewData(),[],[
            'format' => 'A4-L',
            'autoScriptToLang' => false,
            'autoLangToFont' => false,
            'autoVietnamese' => false,
            'autoArabic' => false
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream('document.pdf');
        }, 'document.pdf');

        $pdf = SnappyPdf::loadView('livewire.report-component.report-pdf', $this->returnViewData());

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'document.pdf');

        try {
            // Render the Livewire component into HTML
            $html = View::make('livewire.report-component.report-pdf', $this->returnViewData())->render();

            // Ensure UTF-8 encoding
            $html = mb_convert_encoding($html, 'UTF-8', 'auto');

            // Generate PDF
            $pdf = SnappyPdf::loadHTML($html);

            // Stream the PDF
            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'test.pdf');

        } catch (\Exception $e) {
            // Handle error
            dd('PDF generation error: ' . $e->getMessage());
        }

    }

    public function exportExcel()
    {
        $class = new ReportExport();
        $class->setCurrentView('livewire.report-component.report-excel');
        $class->setCurrentData($this->returnViewData());

        return Excel::download($class, 'report-'.now()->format('d-m-y-h-i').'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    abstract public function builder(): Builder;

    public function returnViewData($pagination = false)
    {
        if ($pagination) {
            $datas = $this->baseBuilder()->paginate(200);
        }else{
            $datas = $this->baseBuilder()->get();
        }

        return ['datas' => $datas, 'view' => $this->view];
    }



    public function render()
    {
        return view('livewire.report-component.report-view', $this->returnViewData(true));
    }
}