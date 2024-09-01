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

    public $view;
    public $pdf_view;
    public $excel_view;
    // public $pdf_export_by = 'mpdf'; // snappy or mpdf
    public $pdf_export_by = 'snappy'; // snappy or mpdf
    public $download_file_name = 'report';


    public function baseBuilder(): Builder
    {
        return $this->builder();
    }

    public function exportPdf()
    {
        try {
            if ($this->pdf_export_by == 'mpdf') {
                return $this->pdfExportByMpdf();
            } else {
                return $this->pdfExportBySnappy();
            }
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
        } else {
            $datas = $this->baseBuilder()->get();
        }

        return ['datas' => $datas, 'view' => $this->view];
    }

    public function pdfExportBySnappy()
    {
        $pdf = SnappyPdf::loadView('livewire.report-component.report-pdf', $this->returnViewData());

        $pdf->setOption('page-size', 'A4'); // A3, A4, A5, Legal, Letter, Tabloid
        $pdf->setOption('orientation', 'Portrait'); // Landscape or Portrait
        // $pdf->setOption('margin-top', '10mm');
        $pdf->setOption('header-center', '[page]/[toPage]'); //header-right='[page]/[toPage]'
        $pdf->setOption('footer-center', '[page]/[toPage]'); //header-right='[page]/[toPage]'
        $pdf->setOption('footer-left', 'Company Name'); //header-right='[page]/[toPage]'
        $pdf->setOption('footer-right', now()->format('d-m-Y')); //header-right='[page]/[toPage]'




        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'document.pdf');
    }

    public function pdfExportByMpdf()
    {

        $pdf = LaravelMpdf::loadView('livewire.report-component.report-pdf', $this->returnViewData(), [], [
            'format' => 'A4',
            'autoScriptToLang' => false,
            'autoLangToFont' => false,
            'autoVietnamese' => false,
            'autoArabic' => false
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream('document.pdf');
        }, 'document.pdf');
    }

    public function render()
    {
        return view('livewire.report-component.report-view', $this->returnViewData(true));
    }
}
